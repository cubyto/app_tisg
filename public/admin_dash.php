<?php 
if(isset($_GET['User'] )){
	$User = $_GET['User'];
}else{
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
  <link rel="stylesheet" href="css/popup.css">
  <link rel="stylesheet" href="css/input.css">
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
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
        <a href="#section-clientes">
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
  <!--Section Pedidos-->
  <div class="sections">
    <section class="section-pedidos" id="section-pedidos">
      <div class="text">Pedidos</div>
      <a id="btn-abrir-popup">
        <i class="bx bxs-plus-circle box-icon"></i>
        <p>Añadir Pedido</p>
      </a>
      <div class="contain_section">
        <div class="box-section">
          <i class="iconify" data-icon="el:shopping-cart-sign"></i>
          <p class="number">256</p>
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
    </section>

    <!--Section Clientes-->
    <section class="section-clientes" id="section-clientes">
      <div class="text">Clientes</div>
    </section>
    <section class="section-pedidos" id="section-campañas">
      <div class="text">Campañas</div>
    </section>
    <section class="section-clientes" id="section-consultoras">
      <div class="text">Consultoras</div>
    </section>
    <section class="section-clientes" id="section-nosotros">
      <div class="text">Nosotros</div>
    </section>
  </div>
  <div class="overlay" id="overlay">
    <div class="popup" id="popup">
      <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup">
        <i class="fas fa-times"></i>
      </a>
      <div class="fecha">
        <h2>NUEVO PEDIDO</h2>
        <p class="dia" id="dia"></p>
        <p>/</p>
        <p class="mes" id="mes"></p>
        <p class="devider" id="devider">/</p>
        <p class="año" id="año"></p>
      </div>
      <form id="input-order" method="POST">
        <div class="contain-inputs">

          <div class="client">
            <h3>Cliente</h3>
            <label class="custom-field three">
              <input type="text" placeholder="&nbsp;" class="Cliente" name="Cliente" id="Cliente">
              <span class="placeholder"><i class="fas fa-user icon"></i> Nombre</span>
              <!-- <i class="fas fa-user icon"></i> -->
              <span class="border"></span>
            </label>
            <label class="custom-field three">
              <input type="number" placeholder="&nbsp;" class="Telefono" name="Telefono" id="Telefono">
              <span class="placeholder"><i class="fas fa-phone"></i> Telefono</span>
              <!-- <i class="fas fa-phone"></i> -->
              <span class="border"></span>
            </label>
            <label class="custom-field three">
              <input type="text" placeholder="&nbsp;" class="Actitud" name="Actitud" id="Actitud">
              <span class="placeholder"><i class="fas fa-smile-beam"></i> Actitud</span>
              <!-- <i class="fas fa-smile-beam"></i> -->
              <span class="border"></span>
            </label>
            <input type="hidden" placeholder="&nbsp;" class="Actitud" name="Actitud" id="User" value="<?php echo $User;?>">
          </div>

          <div class="pedido">
            <h3>Pedido</h3>
            <label class="custom-field three">
              <input type="text" placeholder="&nbsp;" class="Producto" name="Producto" id="Producto">
              <span class="placeholder"><i class="fab fa-wpexplorer"></i> Producto</span>
              <!-- <i class="fas fa-code"></i> -->
              <span class="border"></span>
            </label>
            <div class="inputpedido">
              <label class="custom-field three">
                <input type="number" placeholder="&nbsp;" class="Codigo" name="Codigo" id="Codigo">
                <span class="placeholder"><i class="fas fa-code"></i> Codigo</span>
                <!-- <i class="fab fa-wpexplorer"></i> -->
                <span class="border"></span>
              </label>
              <label class="custom-field three">
                <input type="number" placeholder="&nbsp;" class="Cantidad" name="Cantidad" id="Cantidad">
                <span class="placeholder"><i class="fas fa-sort-amount-down-alt"></i> Cantidad</span>
                <!-- <i class="fas fa-sort-amount-down-alt"></i> -->
                <span class="border"></span>
              </label>
              <label class="custom-field three">
                <input type="number" placeholder="&nbsp;" class="Precio" name="Precio" id="Precio">
                <span class="placeholder"><i class="fas fa-tags"></i> Precio</span>
                <!-- <i class="fas fa-tags"></i> -->
                <span class="border"></span>
              </label>
            </div>
          </div>

        </div>
        <input type="submit" class="btn-submit" id="btn_submit" value="Finalizar">
      </form>
    </div>
  </div>
  <script src="js/admin-dash_script.js"></script>
  <script src="js/popup.js"></script>
  <script src="js/date.js"></script>
  <script src="js/input.js"></script>
  <!-- <script src="js/habilidar_btn.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="../dev/dev_js/input-order_ajax.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>