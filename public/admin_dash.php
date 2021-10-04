<?php
include "../dev/dev_php/Connect_DB.php";

if (isset($_GET['User'])) {
  $User = $_GET['User'];
  $res = $mysql->query("SELECT * FROM Usuarios WHERE 
        Username ='$User' AND
        Confirmado = 'SI'
    ") or die($mysql->error);
  if (mysqli_num_rows($res) > 0) {
    $RowPed = $mysql->query("SELECT * FROM Pedidos") or die($mysql->error);
    $NumPed = mysqli_num_rows($RowPed);
    
  } else {
    $var = '"El usuario detectado no forma parte de nuestra comunidad, le recomendamos crearse una cuenta de "Unique Pay"';
    echo "<script> alert('".$var."'); </script>";
    header('Location: login.html');
  }
} else {
  echo '<script language="javascript">alert("No cuentas con una cuenta de "Unique Pay"");</script>';
  header('Location: login.html');
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <title>admin_dash</title>
  <link rel="shortcut icon" href="assets/icons/logo-favicon.ico" />
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/admin-dash_styles.css">
  <link rel="stylesheet" href="css/search.css">
  <link rel="stylesheet" href="css/popup.css">
  <link rel="stylesheet" href="css/input.css">
  <link rel="stylesheet" href="css/input-consultant.css">
  <link rel="stylesheet" href="css/input-product.css">
  <link rel="stylesheet" href="css/calendary.css">
  <link rel="stylesheet" href="css/table.css">
  <!-- icons and  -->
  <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
</head>

<body>
  <div class="sidebar">
    <div class="logo-details">
      <i>
        <img src="assets/icons/logo.svg" alt="logo">
      </i>
      <div class="logo_name">Unique Pay</div>
      <i class='bx bx-menu' id="btn"></i>
    </div>
    <ul class="nav-list">
      <li>
        <i class='bx bx-search'></i>
        <input type="text" placeholder="Search...">
        <span class="tooltip">Search</span>
      </li>
      <li>
        <a href="#section-pedidos">
          <i class='bx bxs-cart-alt'></i>
          <span class="links_name">Pedidos</span>
        </a>
        <span class="tooltip">Pedidos</span>
      </li>
      <li>
        <a href="#section-clientes" class="sectionclient">
          <i class='bx bxs-user-account'></i>
          <span class="links_name">Clientes</span>
        </a>
        <span class="tooltip">Clientes</span>
      </li>
      <li>
        <a href="#section-campañas">
          <i class='bx bx-calendar'></i>
          <span class="links_name">Campañas</span>
        </a>
        <span class="tooltip">Campañas</span>
      </li>
      <li>
        <a href="#section-consultoras">
          <i class='bx bx-user'></i>
          <span class="links_name">Consultoras</span>
        </a>
        <span class="tooltip">Consultoras</span>
      </li>
      <li>
        <a href="#section-nosotros">
          <i class='bx bxs-group'></i>
          <span class="links_name">Nosotros</span>
        </a>
        <span class="tooltip">Nosotros</span>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-log-out'></i>
          <span class="links_name">Log out</span>
        </a>
        <span class="tooltip">Log out</span>
      </li>
    </ul>
  </div>

  <div class="sections">
    <!--Section Pedidos-->
    <section class="section-pedidos" id="section-pedidos">
      <div class="containerHeader">
        <h1 class="text">Pedidos</h1>
        <div class="search-box">
          <input class='input-search' type="text" placeholder="Type to search..">
          <div class="icon-search">
            <i class='fa fa-search'></i>
          </div>
          <div class="cancel-icon">
            <i class='fa fa-times'></i>
          </div>
          <div class="search-data">
          </div>
        </div>
        <div class="devider"></div>
        <div class="userItem">
          <h1>
            <?php echo $User; ?>
          </h1>
        </div>
        <div class="userimg">
          <img src="assets/images/userimg.jpg" alt="userimg">
        </div>
      </div>
      <a id="btn-abrir-popup">
        <i class="bx bxs-plus-circle box-icon"></i>
        <p>Añadir Pedido</p>
      </a>
      <div class="contain_section">
        <div class="box-section">
          <i class="iconify" data-icon="el:shopping-cart-sign"></i>
          <p class="number"><?php echo $NumPed; ?></p>
          <p>Pedidos</p>
        </div>
      </div>
      <div class="contain_section">
        <div class="box-section">
          <i class="iconify" data-icon="ant-design:dollar-circle-filled"></i>
          <p class="number">248</p>
          <p>Venta total</p>
        </div>
      </div>
      <div class="calendar dark">
        <div class="calendar-header">
          <span class="month-picker" id="month-picker"></span>
          <div class="year-picker">
            <span class="year-change" id="prev-year">
              <pre class='fas fa-angle-left'></pre>
            </span>
            <span id="year"></span>
            <span class="year-change" id="next-year">
              <pre class="fas fa-angle-right"></pre>
            </span>
          </div>
        </div>
        <div class="calendar-body">
          <div class="calendar-week-day">
            <div>Dom</div>
            <div>Lun</div>
            <div>Mar</div>
            <div>Mier</div>
            <div>Jue</div>
            <div>Vie</div>
            <div>Sab</div>
          </div>
          <div class="calendar-days"></div>
        </div>
        <div class="month-list"></div>
      </div>
    </section>

    <!--Section Clientes-->
    <section class="section-clientes" id="section-clientes">
      <div class="containerHeader">
        <h1 class="text">Clientes</h1>
        <div class="search-box">
          <input class='input-search' type="text" placeholder="Type to search..">
          <div class="icon-search">
            <i class='fa fa-search'></i>
          </div>
          <div class="cancel-icon">
            <i class='fa fa-times'></i>
          </div>
          <div class="search-data">
          </div>
        </div>
        <div class="devider"></div>
        <div class="userItem">
          <h1>
            <?php echo $User; ?>
          </h1>
        </div>
        <div class="userimg">
          <img src="assets/images/userimg.jpg" alt="userimg">
        </div>
      </div>
      <a id="btn-abrir-popup-client">
        <i class="bx bxs-plus-circle box-icon"></i>
        <p>Añadir Cliente</p>
      </a>
      <div class="contain_section">
        <div class="box-section">
          <i class="iconify" data-icon="el:shopping-cart-sign"></i>
          <p class="number">256</p>
          <p>Cliente</p>
        </div>
      </div>
      <div class="contain_section">
        <div class="box-section">
          <i class="iconify" data-icon="ant-design:dollar-circle-filled"></i>
          <p class="number">248</p>
          <p>Entregados total</p>
        </div>
      </div>
      <div class="calendar dark">
      </div>
      <div class="datatable-container">
        <table class="datatable">
            <thead>
                <tr>
                    <th>Nro°</th>
                    <th>Cliente</th>
                    <th>Telefono</th>
                    <th>Actitud</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Marcos Rivas</td>
                    <td>945678213</td>
                    <td>Puntual</td>
                    <td>2020/05/01</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Lena Sanchez</td>
                    <td>974159852</td>
                    <td>Moroso</td>
                    <td>2020/07/01</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Juan Perez</td>
                    <td>985275456</td>
                    <td>Bueno</td>
                    <td>2019/05/01</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Alma Mater</td>
                    <td>9635854183</td>
                    <td>Malo</td>
                    <td>2020/05/01</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Alma Mater</td>
                    <td>9635854183</td>
                    <td>Malo</td>
                    <td>2020/05/01</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Alma Mater</td>
                    <td>9635854183</td>
                    <td>Malo</td>
                    <td>2020/05/01</td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>Alma Mater</td>
                    <td>9635854183</td>
                    <td>Malo</td>
                    <td>2020/05/01</td>
                </tr>
            </tbody>
        </table>
        <div class="footer-tools">
            <div class="pages">
                <ul>
                    <li><span class="active">1</span></li>
                    <li><button>2</button></li>
                    <li><button>3</button></li>
                    <li><button>4</button></li>
                    <li><span>...</span></li>
                    <li><button>9</button></li>
                    <li><button>10</button></li>
                </ul>
            </div>
        </div>
    </div>
    </section>

    <!--Section Campañas-->
    <section class="section-campañas" id="section-campañas">
      <div class="containerHeader">
        <h1 class="text">Campañas</h1>
        <div class="search-box">
          <input class='input-search' type="text" placeholder="Type to search..">
          <div class="icon-search">
            <i class='fa fa-search'></i>
          </div>
          <div class="cancel-icon">
            <i class='fa fa-times'></i>
          </div>
          <div class="search-data">
          </div>
        </div>
        <div class="devider"></div>
        <div class="userItem">
          <h1>
            <?php echo $User; ?>
          </h1>
        </div>
        <div class="userimg">
          <img src="assets/images/userimg.jpg" alt="userimg">
        </div>
      </div>

    </section>

    <!--Section Consultoras-->
    <section class="section-consultoras" id="section-consultoras">
      <div class="containerHeader">
        <h1 class="text">Consultoras</h1>
        <div class="search-box">
          <input class='input-search' type="text" placeholder="Type to search..">
          <div class="icon-search">
            <i class='fa fa-search'></i>
          </div>
          <div class="cancel-icon">
            <i class='fa fa-times'></i>
          </div>
          <div class="search-data">
          </div>
        </div>
        <div class="devider"></div>
        <div class="userItem">
          <h1>
            <?php echo $User; ?>
          </h1>
        </div>
        <div class="userimg">
          <img src="assets/images/userimg.jpg" alt="userimg">
        </div>
      </div>
      <a id="btn-abrir-popup-consultant">
        <i class="bx bxs-plus-circle box-icon"></i>
        <p>Añadir Consultora</p>
      </a>
      <div class="contain_section">
        <div class="box-section">
          <i class="iconify" data-icon="el:shopping-cart-sign"></i>
          <p class="number">256</p>
          <p>Confirmadas</p>
        </div>
      </div>
      <div class="contain_section">
        <div class="box-section">
          <i class="iconify" data-icon="ant-design:dollar-circle-filled"></i>
          <p class="number">248</p>
          <p>Pendietes</p>
        </div>
      </div>
      <div class="calendar dark">
      </div>
      <div class="datatable-container">
        <table class="datatable">
            <thead>
                <tr>
                    <th>Nro°</th>
                    <th>Cliente</th>
                    <th>Telefono</th>
                    <th>Actitud</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Marcos Rivas</td>
                    <td>945678213</td>
                    <td>Puntual</td>
                    <td>2020/05/01</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Lena Sanchez</td>
                    <td>974159852</td>
                    <td>Moroso</td>
                    <td>2020/07/01</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Juan Perez</td>
                    <td>985275456</td>
                    <td>Bueno</td>
                    <td>2019/05/01</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Alma Mater</td>
                    <td>9635854183</td>
                    <td>Malo</td>
                    <td>2020/05/01</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Alma Mater</td>
                    <td>9635854183</td>
                    <td>Malo</td>
                    <td>2020/05/01</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Alma Mater</td>
                    <td>9635854183</td>
                    <td>Malo</td>
                    <td>2020/05/01</td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>Alma Mater</td>
                    <td>9635854183</td>
                    <td>Malo</td>
                    <td>2020/05/01</td>
                </tr>
            </tbody>
        </table>
        <div class="footer-tools">
            <div class="pages">
                <ul>
                    <li><span class="active">1</span></li>
                    <li><button>2</button></li>
                    <li><button>3</button></li>
                    <li><button>4</button></li>
                    <li><span>...</span></li>
                    <li><button>9</button></li>
                    <li><button>10</button></li>
                </ul>
            </div>
        </div>
    </div>
    </section>

    <!--Section nosotros-->
    <section class="section-nosotros" id="section-nosotros">
      <div class="containerHeader">
        <h1 class="text">Nosotros</h1>
      </div>
    </section>
  </div>

  <!-- POPUP_ORDER -->
  <div class="overlay" id="overlay-order">
    <div class="popup" id="popup-order">
      <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup">
        <i class="fas fa-times"></i>
      </a>
      <div class="fecha">
        <h2>NUEVO PEDIDO</h2>
        <p class="dia" id="dia"></p>
        <p>/</p>
        <p class="mes" id="mes"></p>
        <p id="devider">/</p>
        <p class="año" id="año"></p>
      </div>
      <form id="input-order" method="POST">
        <div class="contain-inputs">

          <div class="client">
            <h3>Cliente</h3>
            <label class="custom-field three">
              <input type="text" placeholder="&nbsp;" class="Cliente" name="Cliente" id="Cliente" autocomplete="off">
              <span class="placeholder"><i class="fas fa-user icon"></i> Nombre</span>
              <span class="border"></span>
            </label>
            <label class="custom-field three">
              <input type="number" placeholder="&nbsp;" class="Telefono" name="Telefono" id="Telefono">
              <span class="placeholder"><i class="fas fa-phone"></i> Telefono</span>
              <span class="border"></span>
            </label>
            <label class="custom-field three">
              <input type="text" placeholder="&nbsp;" class="Actitud" name="Actitud" id="Actitud">
              <span class="placeholder"><i class="fas fa-smile-beam"></i> Actitud</span>
              <span class="border"></span>
            </label>
            <input type="hidden" placeholder="&nbsp;" class="Actitud" name="Actitud" id="User"
              value="<?php echo $User; ?>">
            <input type="hidden" placeholder="&nbsp;" class="date" name="Date" id="Date"
              value="<?php date_default_timezone_set('UTC'); echo date("d/m/Y"); ?>">
          </div>

          <div class="pedido">
            <h3>Pedido</h3>
            <label class="custom-consultant two">
              <input type="text" placeholder="&nbsp;" class="Producto" name="Producto" id="Producto" autocomplete="off">
              <span class="placeholder"><i class="fab fa-wpexplorer"></i> Producto</span>
              <span class="border"></span>
            </label>

            <div class="inputpedido">
              <label class="custom-field one">
                <input type="number" placeholder="&nbsp;" class="Codigo" name="Codigo" id="Codigo">
                <span class="placeholder"><i class="fas fa-code"></i> Codigo</span>
                <span class="border"></span>
              </label>
              <label class="custom-field one">
                <input type="number" placeholder="&nbsp;" class="Cantidad" name="Cantidad" id="Cantidad">
                <span class="placeholder"><i class="fas fa-sort-amount-down-alt"></i> Cantidad</span>
                <span class="border"></span>
              </label>
              <label class="custom-field one">
                <input type="number" placeholder="&nbsp;" class="Precio" name="Precio" id="Precio" step="any">
                <span class="placeholder"><i class="fas fa-tags"></i> Precio</span>
                <span class="border"></span>
              </label>
              <label class="custom-field one">
                <input type="number" placeholder="&nbsp;" class="Precio" name="Precio" id="Priceofert" step="any">
                <span class="placeholder"><i class="fas fa-tags"></i> Precio oferta</span>
                <span class="border"></span>
              </label>
            </div>
          </div>

        </div>
        <input type="submit" class="btn-submit" id="btn_submit" value="Finalizar">
      </form>
    </div>
  </div>

  <!-- POPUP_CLIENT -->
  <div class="overlay" id="overlay-client">
    <div class="popup one" id="popup-client">
      <a id="btn-cerrar-popup-client" class="btn-cerrar-popup">
        <i class="fas fa-times"></i>
      </a>
      <div class="fecha">
        <h2>NUEVO CLIENTE</h2>
        <p class="dia" id="diaClient"></p>
        <p>/</p>
        <p class="mes" id="mesClient"></p>
        <p>/</p>
        <p class="año" id="añoClient"></p>
      </div>
      <form id="input-client" method="POST">
        <div class="contain-inputs">

          <div class="client">
            <h3>Cliente</h3>
            <label class="custom-field three">
              <input type="text" placeholder="&nbsp;" class="Cliente" id="NomClient" autocomplete="off">
              <span class="placeholder"><i class="fas fa-user icon"></i> Nombre</span>
              <span class="border"></span>
            </label>
            <label class="custom-field three">
              <input type="number" placeholder="&nbsp;" class="Telefono" id="PhoneClient">
              <span class="placeholder"><i class="fas fa-phone"></i> Telefono</span>
              <span class="border"></span>
            </label>
            <label class="custom-field three">
              <input type="text" placeholder="&nbsp;" class="Actitud" id="ActClient">
              <span class="placeholder"><i class="fas fa-smile-beam"></i> Actitud</span>
              <span class="border"></span>
            </label>
            <input type="hidden" placeholder="&nbsp;" class="Actitud" id="UserClient" value="<?php echo $User; ?>">
            <input type="hidden" placeholder="&nbsp;" class="date" name="Date" id="DateTime"
              value="<?php date_default_timezone_set('UTC'); echo date("d/m/Y"); ?>">
          </div>
        </div>
        <input type="submit" class="btn-submit" id="btnclient_submit" value="Finalizar">
      </form>
    </div>
  </div>

  <!-- POPUP_CONSULTORA -->
  <div class="overlay" id="overlay-consultant">
    <div class="popup two" id="popup-consultant">
      <a id="btn-cerrar-popup-consultant" class="btn-cerrar-popup">
        <i class="fas fa-times"></i>
      </a>
      <div class="fecha">
        <h2>NUEVA CONSULTORA</h2>
        <p class="dia" id="diaconsultant"></p>
        <p>/</p>
        <p class="mes" id="mesconsultant"></p>
        <p>/</p>
        <p class="año" id="añoconsultant"></p>
      </div>
      <form id="input-consultant" method="POST">
        <div class="contain-inputs">

          <div class="client">
            <h3>Consultora</h3>
            <label class="custom-consultant two">
              <input type="text" placeholder="&nbsp;" class="Cliente" name="NomConsultant" id="NomConsultant"
                autocomplete="off">
              <span class="placeholder"><i class="fas fa-user icon"></i> Nombres</span>
              <span class="border"></span>
            </label>
            <label class="custom-consultant two">
              <input type="text" placeholder="&nbsp;" class="Cliente" name="Cliente" id="ApeConsultant"
                autocomplete="off">
              <span class="placeholder"><i class="fas fa-user icon"></i> Apellidos</span>
              <span class="border"></span>
            </label>
            <label class="custom-consultant two">
              <input type="number" placeholder="&nbsp;" class="Telefono" name="Telefono" id="PhoneConsultant">
              <span class="placeholder"><i class="fas fa-phone"></i> Telefono</span>
              <span class="border"></span>
            </label>
            <label class="custom-consultant two">
              <input type="email" placeholder="&nbsp;" id="EmailConsultant">
              <span class="placeholder"><i class="fas fa-at"></i> E-mail</span>
              <span class="border"></span>
            </label>
            <input type="hidden" placeholder="&nbsp;" class="Actitud" name="Actitud" id="UserConsultant"
              value="<?php echo $User; ?>">
            <input type="hidden" placeholder="&nbsp;" class="date" name="Date" id="DateConsultant"
              value="<?php date_default_timezone_set('MST'); echo date("d/m/Y"); ?>">
          </div>
        </div>
        <input type="submit" class="btn-submit" id="btnconsultant_submit" value="Finalizar">
      </form>
    </div>
  </div>
  <script src="js/admin-dash_script.js"></script>
  <script src="js/popup.js"></script>
  <script src="js/popup_client.js"></script>
  <script src="js/popup_consultant.js"></script>
  <script src="js/date.js"></script>
  <script src="js/date_client.js"></script>
  <script src="js/date_consultant.js"></script>
  <script src="js/input.js"></script>
  <script src="js/calendary.js"></script>
  <script src="js/search.js"></script>
  <!-- <script src="js/table.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
  <script src="../dev/dev_js/input-client_ajax.js"></script>
  <script src="../dev/dev_js/input-order_ajax.js"></script>
  <script src="../dev/dev_js/input-consultant_ajax.js"></script>
  <script src="../dev/dev_js/autocomplete-consult_ajax.js"></script>
  <script src="../dev/dev_js/Autocomplete-consult_ape.js"></script>
  <script src="../dev/dev_js/autocomplete-client_ajax.js"></script>
  <script src="../dev/dev_js/Autocomplete-product_name.js"></script>
  <script src="../dev/dev_js/Autocomplete-product_client.js"></script>
</body>

</html>