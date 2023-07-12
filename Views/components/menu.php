                <a href="#" class="content-menu-toggle btn btn-primary"><i class="material-icons">menu</i> Menú</a>
                <div class="content-menu content-menu-right">
                    <ul class="list-unstyled">
                        <li><a href="<?=BASE_URL.'archivos'?>" class="<?=($data['active'] == 'todos') ? 'active' : ''?>">Todos</a></li>
                        <li><a href="<?=BASE_URL.'admin'?>" class="<?=($data['active'] == 'recents') ? 'active' : ''?>">Recientes</a></li>
                        <li><a href="#" class="<?=($data['active'] == 'deleted') ? 'active' : ''?>">Eliminados</a></li>
                        <li class="divider"></li>
                        <li><a href="#" class="<?=($data['active'] == 'detail') ? 'active' : ''?>">Detalles</a></li>
                        <li><a href="#" class="<?=($data['active'] == 'share') ? 'active' : ''?>">Compartidos</a></li>
                    </ul>
                </div>