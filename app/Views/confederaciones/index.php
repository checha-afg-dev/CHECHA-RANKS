<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="text-uppercase">Confederaciones</h1>
    <a href="<?= base_url('confederaciones/create') ?>" class="btn btn-primary">Agregar Confederación</a>
</div>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('error') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<div class="table-responsive">
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Logo</th>
                <th>Nombre</th>
                <th>Creado</th>
                <th>Actualizado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($confederaciones)): ?>
                <?php foreach ($confederaciones as $confederacion): ?>
                    <tr>
                        <td><?= esc($confederacion['id']) ?></td>
                        <td>
                            <?php if (!empty($confederacion['logo'])): ?>
                                <img src="<?= esc($confederacion['logo']) ?>" alt="Logo" style="width: 50px; height: 50px; object-fit: cover;">
                            <?php else: ?>
                                Sin Logo
                            <?php endif; ?>
                        </td>
                        <td><?= esc($confederacion['nombre']) ?></td>
                        <td><?= esc($confederacion['created_at']) ?></td>
                        <td><?= esc($confederacion['updated_at']) ?></td>
                        <td>
                            <a href="<?= base_url('confederaciones/edit/' . $confederacion['id']) ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="<?= base_url('confederaciones/delete/' . $confederacion['id']) ?>" class="btn btn-danger btn-sm" data-checha-confirm data-title="Eliminar Confederación" data-message="¿Estás seguro de que deseas eliminar esta confederación?" data-type="danger">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">No hay confederaciones registradas.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>