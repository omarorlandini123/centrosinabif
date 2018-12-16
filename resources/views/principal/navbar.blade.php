<nav class="navbar navbar-expand-lg navbar-light " style="background-color: #e3f2fd;">
  <a class="navbar-brand" href="#">Atención Ambulatoria</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText"
    aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          Registro de Acogida
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="/historias">Filiación de Pacientes</a>
          <a class="dropdown-item" href="/mispacientes">Mis Pacientes</a>
          <a class="dropdown-item" href="/historial">Historial Clínico</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          Citas Médicas
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="/cita/nuevo">Registrar Cita</a>
          <a class="dropdown-item" href="/citas">Citas Registradas</a>

        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          Facturación
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="/facturas">Caja</a>
          <a class="dropdown-item" href="/tarifas">Tarifario</a>

        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          Administrador
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="/usuarios">Usuarios</a>
          <a class="dropdown-item" href="/medicos">Médicos</a>
          <a class="dropdown-item" href="/especialidades">Especialidades</a>
          <a class="dropdown-item" href="/motivos">Motivos</a>
          <a class="dropdown-item" href="/citas">Privilegios</a>
          <a class="dropdown-item" href="/citas">Horarios Médicos</a>
        </div>
      </li>
    </ul>
    @if(Session::has('usuarioLogin'))
    <span class="navbar-text">
      @inject('Usuario', 'App\modelos\Usuario')
      <label style="margin-right:15px;">{{$Usuario::find(Session::has('usuario_id'))->first()->persona->nombreCompleto()}}</label>

      <a href="/logout">Cerrar Sesión</a>
    </span>
    @endif
  </div>
</nav>