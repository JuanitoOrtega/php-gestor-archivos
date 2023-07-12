            <div class="app-menu">
                <ul class="accordion-menu">
                    <li class="sidebar-title">
                        Aplicación
                    </li>
                    <li class="<?=($data['active'] == 'usuarios') ? 'active-page' : ''?>">
                        <a href="<?=BASE_URL?>usuarios"><i class="material-icons-two-tone">people</i>Usuarios</a>
                    </li>
                    <li class="<?=($data['active'] == 'recents' || $data['active'] == 'todos') ? 'active-page' : ''?>">
                        <a href="<?=BASE_URL?>admin"><i class="material-icons-two-tone">cloud_queue</i>Archivos</a>
                    </li>
                    <li class="<?=($data['active'] == 'compartidos' || $data['active'] == 'todos') ? 'active-page' : ''?>">
                        <a href="<?=BASE_URL?>compartidos"><i class="material-icons-two-tone">share</i>Compartidos</a>
                    </li>
                </ul>
            </div>