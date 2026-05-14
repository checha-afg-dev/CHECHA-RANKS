<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-md-8">
        <h1 class="text-uppercase mb-4">Crear Confederación</h1>

        <?php if (session()->getFlashdata('errors')): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('confederaciones/store') ?>" method="post">
            <?= csrf_field() ?>

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control bg-dark text-white border-secondary" id="nombre" name="nombre" value="<?= old('nombre') ?>" required>
            </div>

            <div class="mb-3">
                <label for="logo" class="form-label">Logo (URL)</label>
                <input type="url" class="form-control bg-dark text-white border-secondary" id="logo" name="logo" value="<?= old('logo') ?>">
            </div>

            <button type="submit" class="btn btn-primary">Crear</button>
            <a href="<?= base_url('confederaciones') ?>" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
<?= $this->endSection() ?>