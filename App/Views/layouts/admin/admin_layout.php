
<?php $this->render('blocks/header'); ?>
<?php $this->render('blocks/siderbar', $active); ?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1><?= $title ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Pages</li>
                <li class="breadcrumb-item active"><?= $title ?></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <?php $this->render($content, $data); ?>
</main><!-- End #main -->

<?php $this->render('blocks/footer'); ?>
