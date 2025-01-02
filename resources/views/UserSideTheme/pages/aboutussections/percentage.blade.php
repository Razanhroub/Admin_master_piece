<style>
    .counter-wrap .text {
        text-shadow: -1px -1px 0 black, 1px -1px 0 black, -1px 1px 0 black, 1px 1px 0 black;
    }
</style>

<section class="ftco-section ftco-counter img" id="section-counter"
    style="background-image: url({{ asset('Userassets') }}/images/bg_4.jpeg);" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row d-md-flex align-items-center justify-content-center">
            <div class="col-lg-10">
                <div class="row d-md-flex align-items-center">
                    <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18">
                            <div class="text">
                                <strong class="number" data-number="{{ $blogPostsCount }}">0</strong>
                                <span>Blog Posts</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18">
                            <div class="text">
                                <strong class="number" data-number="{{ $activeUsersCount }}">0</strong>
                                <span>Active Users</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18">
                            <div class="text">
                                <strong class="number" data-number="{{ $recipesCount }}">0</strong>
                                <span>Recipes</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18">
                            <div class="text">
                                <strong class="number" data-number="{{ $ingredientsCount }}">0</strong>
                                <span>Ingredients</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>