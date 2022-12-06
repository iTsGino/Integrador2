<?php
$Direccion = $_SERVER['PHP_SELF'];

$sql2 = $Con->prepare("select * from mensajes where tipo='Enviado' and UsuDes = '$Usuario';");
$sql2->execute();
$res2 = $sql2->fetchAll(PDO::FETCH_ASSOC);
$ConBandeja = 0;
foreach ($res2 as $row) {
  $ConBandeja = $ConBandeja+1;
}
$sql3 = $Con->prepare("SELECT * FROM mensajes WHERE UsuEmi = '$Usuario' and tipo='Enviado';");
$sql3->execute();
$res3 = $sql3->fetchAll(PDO::FETCH_ASSOC);
$ConEnviado = 0;
foreach ($res3 as $row) {
    $ConEnviado = $ConEnviado+1;
  }
?>

<section class="content">
      <div class="row">
        <div class="col-md-3">
          <form action="MensajesDoc/NewMessageDoc.php" method="post">
            <input type="hidden" name="direccion" id="direccion" value="<?php echo $Direccion; ?>">
            <button type="submit" class="btn btn-primary btn-block mb-3">Nuevo Mensaje</button>
          </form>
          <div class="card">
            <div class="card-header">
                <h4 class="card-title">Carpetas</h4>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
              <ul class="nav nav-pills flex-column">
                <li class="nav-item active">
                  <a href="javascript:document.location.reload();" class="nav-link">
                    <i class="fas fa-inbox"></i> Bandeja de Entrada
                    <span class="badge bg-primary float-right"><?php echo $ConBandeja; ?></span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="MensajesDoc/EnviadosDoc.php" class="nav-link">
                    <i class="far fa-envelope"></i> Enviados
                    <span class="badge bg-warning float-right"><?php echo $ConEnviado; ?></span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="MensajesDoc/PapeleraDoc.php" class="nav-link">
                    <i class="far fa-trash-alt"></i> Papelera
                    <span class="badge bg-danger float-right">3</span>
                  </a>
                </li>
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Bandeja de Entrada</h3>
                <div align="right" class="mailbox-controls">
                  <!-- Check all button -->
                  <a type="button" class="btn btn-default btn-sm" href="javascript:document.location.reload();">
                    <i class="fas fa-sync-alt"></i>
                  </a>
                  <!-- /.float-right -->
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                    <?php
                    foreach ($res2 as $row) {
                      ?>
                      <form action="MensajesDoc/ReadMailDoc.php" method="post">
                          <tr>
                              <td>
                                  <div class="icheck-primary">
                                    <a type="button" class="btn btn-default btn-sm" href="MensajesDoc/MandaPapeleraDoc.php?id=<?php echo $row['id']; ?>">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                  </div>
                              </td>
                              <td class="mailbox-star"><a href="#"><i class="fas fa-star text-warning"></i></a></td>
                              <td class="mailbox-name">
                                  <input type="hidden" name="direccion" id="direccion" value="<?php echo $Direccion; ?>">
                                  <input type="hidden" name="id" id="id" value="<?php echo $row['id']; ?>">
                                  <button type="submit" class="btn btn-link"><?php echo $row['UsuEmi']; ?></button>
                              </td>
                              <td class="mailbox-subject"><b><?php echo $row['asunto']; ?></b></td>
                              <td class="mailbox-subject"><?php echo $row['mensaje']; ?></td>
                              <td class="mailbox-attachment"></td>
                              <td class="mailbox-date"><?php echo $row['fecha']; ?></td>
                          </tr>
                      </form>
                      <?php
                    }
                    ?>
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>