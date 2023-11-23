<!-- ======= Blog Section ======= -->
<section id="blog" class="blog">
    <div class="container" data-aos="fade-up">
        <h1>Статьи</h1> <!-- Add your title here -->
        <div class="row">

            <div class="col-lg-8 entries">

                <?php
                echo getArticleList();
                echo showArticle();
                ?>
            </div><!-- End blog entries list -->

            <div class="col-lg-4">

                <?php include 'template/frontend/partials/sidebar.php' ?>

            </div><!-- End blog sidebar -->

        </div>

    </div>
</section><!-- End Blog Section -->

