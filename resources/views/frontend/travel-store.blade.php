@extends('layouts.frontend')
@section('title', 'travel-store')
@push('styles')

@endpush
@section('content')
<div class='loading'>
    <div class='lds-dual-ring'></div>
</div>
<section>
    <div class="page-banner">
        <div class="container">
            <div class="page-banner__tittle">
                <h1>Grid Left Sidebar</h1>
                <p>Home / Tours / <span>Grid Left Sidebar</span> </p>
            </div>
        </div>
    </div>
</section>
<section class="grid-left-sidebar">
    <div class="container">
        <div class="row">

            <div class="col-xl-3 col-lg-4 col-md-5">
                <div class="left-sidebar">
                    <div class="left-sidebar__item left-sidebar__item--form">
                        <h3>PLAN YOUR TRIP</h3>
                        <form class="left-sidebar-form" action="POST">
                            <div class="form__item form__item--select">
                                <label>Destination</label>
                                <div class="custom-select">
                                    <select>
                                        <option value="0">Select destinaion</option>
                                        <option value="SanFrancisco">SanFrancisco</option>
                                        <option value="NewYork">NewYork</option>
                                        <option value="California">California</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form__item ">
                                <label>Check in</label>
                                <div class="form__item--datepicker">
                                    <span class="far fa-calendar-alt"></span>
                                    <input value="31 / 4 / 2017" type="text" id="date-check-in" data-select="datepicker">
                                </div>
                            </div>
                            <div class="form__item">
                                <label>Check out</label>
                                <div class="form__item--datepicker">
                                    <span class="far fa-calendar-alt"></span>
                                    <input value="6 / 2 / 2018" type="text" id="date-check-out" data-select="datepicker">
                                </div>
                            </div>
                            <div class="form__item form__item--select">
                                <label>Travel type</label>
                                <div class="custom-select">
                                    <select>
                                        <option value="0">Select destinaion</option>
                                        <option value="Adventure">Adventure</option>
                                        <option value="Hiking">Hiking</option>
                                        <option value="Suffing">Suffing</option>
                                    </select>
                                </div>
                            </div>

                            <div class="left-sidebar__price-range">
                                <label>Filter Price</label>
                                <div class="left-sidebar__price-range__value">
                                    <span id="slider-range-value1"></span>
                                    <span id="slider-range-value2"></span>
                                </div>
                                <div class="left-sidebar__price-range__range" id="slider-range"></div>
                                <input type="hidden" name="min-value">
                                <input type="hidden" name="max-value">
                            </div>
                            <input class="left-sidebar-form__submit" type="submit" value="SEARCH">
                        </form>
                    </div>

                    <div class="left-sidebar__item left-sidebar__item--type-filter ">
                        <h3>type filter</h3>
                        <form action="#" class="left-sidebar-form">
                            <label>Star Rating</label>
                            <div class="star-rating">
                                <p class="star-rating__field">
                                    <input name="rating" type="checkbox">
                                    <span class="star-rating__box"></span><span class="star-rating__5-stars"></span>
                                </p>
                                <p class="star-rating__field">
                                    <input name="rating" type="checkbox">
                                    <span class="star-rating__box"></span><span class="star-rating__4-stars"></span>
                                </p>
                                <p class="star-rating__field">
                                    <input name="rating" type="checkbox">
                                    <span class="star-rating__box"></span><span class="star-rating__3-stars"></span>
                                </p>
                                <p class="star-rating__field">
                                    <input name="rating" type="checkbox">
                                    <span class="star-rating__box"></span><span class="star-rating__2-stars"></span>
                                </p>
                                <p class="star-rating__field">
                                    <input name="rating" type="checkbox">
                                    <span class="star-rating__box"></span><span class="star-rating__1-stars"></span>
                                </p>
                            </div>

                            <label>Duration</label>
                            <div class="duration">
                                <p class="star-rating__field">
                                    <input name="duration" type="checkbox">
                                    <span class="star-rating__box"></span><span class="choices-content">1 Day Tour</span>
                                </p>
                                <p class="star-rating__field">
                                    <input name="duration" type="checkbox">
                                    <span class="star-rating__box"></span><span class="choices-content">2 - 4 Days Tour</span>
                                </p>
                                <p class="star-rating__field">
                                    <input name="duration" type="checkbox">
                                    <span class="star-rating__box"></span><span class="choices-content">5 - 7 Days Tour</span>
                                </p>
                                <p class="star-rating__field">
                                    <input name="duration" type="checkbox">
                                    <span class="star-rating__box"></span><span class="choices-content">7+ Days Tour</span>
                                </p>
                                <a href="#" class=" duration__arrow-down">More</a>
                            </div>

                            <label>Activity Type</label>
                            <div class="activity-type">
                                <p class="star-rating__field">
                                    <input name="activity" type="checkbox">
                                    <span class="star-rating__box"></span><span class="choices-content">Trekking</span>
                                </p>
                                <p class="star-rating__field">
                                    <input name="activity" type="checkbox">
                                    <span class="star-rating__box"></span><span class="choices-content">Kayaking</span>
                                </p>
                                <p class="star-rating__field">
                                    <input name="activity" type="checkbox">
                                    <span class="star-rating__box"></span><span class="choices-content">Camping</span>
                                </p>
                                <p class="star-rating__field">
                                    <input name="activity" type="checkbox">
                                    <span class="star-rating__box"></span><span class="choices-content">Adventure</span>
                                </p>
                                <p class="star-rating__field">
                                    <input name="activity" type="checkbox">
                                    <span class="star-rating__box"></span><span class="choices-content">Skiing</span>
                                </p>
                                <a href="#" class="duration__arrow-down">More</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <script src="assets/scripts/jquery-3.4.1.js"> </script>
            <script src="assets/scripts/priceRangeSlider.js"></script>



            <div class="col-xl-9 col-lg-8 col-md-7">
                <div class="grid-left-sidebar__filter">
                    <span class="grid-left-sidebar__filter--result">9 Results Found</span>
                    <div class="grid-left-sidebar__filter--mode">
                        <div class=" custom-select">
                            <select>
                                <option value="0">Default Sorting</option>
                                <option value="SanFrancisco">Alphabet</option>
                                <option value="NewYork">Price: Low to high</option>
                                <option value="California">Price: Hight to low</option>
                            </select>
                        </div>
                        <div class=" grid-left-sidebar__filter--mode--sort">
                            <img src="assets/images/tours/sort-mode-list.png" alt="sort-mode-list">
                        </div>
                        <div class=" grid-left-sidebar__filter--mode--sort">
                            <img src="assets/images/tours/sort-mode-grid.png" alt="sort-mode-grid">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-xl-4 col-sm-6 col-md-12">
                        <a href="tour-item.html" class="trending-tour-item">
                            <div class="trending-tour-item__sale"></div>
                            <img class="trending-tour-item__thumnail" src="assets/images/uploads/tours/tour1.jpg" alt="tour1">
                            <div class="trending-tour-item__info">
                                <h3 class="trending-tour-item__name">
                                    nepal camp treks
                                </h3>
                                <div class="trending-tour-item__group-infor">
                                    <div class="trending-tour-item__group-infor--left">
                                        <span class="trending-tour-item__group-infor__rating"></span>
                                        <div class="trending-tour-item__group-infor__lasting"><img src="assets/images/tours/lasting.png" alt="lasting"> 5 Days / 4 Nights</div>
                                    </div>

                                    <p class="trending-tour-item__group-infor__sale-price">$999</p>
                                    <span class="trending-tour-item__group-infor__price">$799</span>

                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6 col-xl-4 col-sm-6 col-md-12">
                        <a href="tour-item.html" class="trending-tour-item">
                            <img class="trending-tour-item__thumnail" src="assets/images/uploads/tours/tour2.jpg" alt="tour1">
                            <div class="trending-tour-item__info">
                                <h3 class="trending-tour-item__name">
                                    trekking everest
                                </h3>
                                <div class="trending-tour-item__group-infor">
                                    <div class="trending-tour-item__group-infor--left">
                                        <span class="trending-tour-item__group-infor__rating--4star"></span>
                                        <div class="trending-tour-item__group-infor__lasting"><img src="assets/images/tours/lasting.png" alt="lasting"> 7 Days / 6 Nights</div>
                                    </div>
                                    <span class="trending-tour-item__group-infor__price">$652</span>

                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6 col-xl-4 col-sm-6 col-md-12">
                        <a href="tour-item.html" class="trending-tour-item">
                            <img class="trending-tour-item__thumnail" src="assets/images/uploads/tours/tour3.jpg" alt="tour1">
                            <div class="trending-tour-item__info">
                                <h3 class="trending-tour-item__name">
                                    Kelingking beach
                                </h3>
                                <div class="trending-tour-item__group-infor">
                                    <div class="trending-tour-item__group-infor--left">
                                        <span class="trending-tour-item__group-infor__rating"></span>
                                        <div class="trending-tour-item__group-infor__lasting"><img src="assets/images/tours/lasting.png" alt="lasting"> 3 Days / 2 Nights</div>
                                    </div>
                                    <span class="trending-tour-item__group-infor__price">$456</span>

                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-6 col-xl-4 col-sm-6 col-md-12">
                        <a href="tour-item.html" class="trending-tour-item">
                            <img class="trending-tour-item__thumnail" src="assets/images/uploads/tours/tour4.jpg" alt="tour1">
                            <div class="trending-tour-item__info">
                                <h3 class="trending-tour-item__name">
                                    Turkey Encompassed
                                </h3>
                                <div class="trending-tour-item__group-infor">
                                    <div class="trending-tour-item__group-infor--left">
                                        <span class="trending-tour-item__group-infor__rating"></span>
                                        <div class="trending-tour-item__group-infor__lasting"><img src="assets/images/tours/lasting.png" alt="lasting"> 6 Days / 6 Nights</div>
                                    </div>

                                    <span class="trending-tour-item__group-infor__price">$703</span>

                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6 col-xl-4 col-sm-6 col-md-12">
                        <a href="tour-item.html" class="trending-tour-item">
                            <img class="trending-tour-item__thumnail" src="assets/images/uploads/tours/tour5.jpg" alt="tour5">
                            <div class="trending-tour-item__info">
                                <h3 class="trending-tour-item__name">
                                    Broho Midnight Tour
                                </h3>
                                <div class="trending-tour-item__group-infor">
                                    <div class="trending-tour-item__group-infor--left">
                                        <span class="trending-tour-item__group-infor__rating--3star"></span>
                                        <div class="trending-tour-item__group-infor__lasting"><img src="assets/images/tours/lasting.png" alt="lasting"> 2 Days / 1 Nights</div>
                                    </div>
                                    <span class="trending-tour-item__group-infor__price">$531</span>

                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6 col-xl-4 col-sm-6 col-md-12">
                        <a href="tour-item.html" class="trending-tour-item">
                            <div class="trending-tour-item__sale"></div>
                            <img class="trending-tour-item__thumnail" src="assets/images/uploads/tours/tour6.jpg" alt="tour6">
                            <div class="trending-tour-item__info">
                                <h3 class="trending-tour-item__name">
                                    Giza Pyramids
                                </h3>
                                <div class="trending-tour-item__group-infor">
                                    <div class="trending-tour-item__group-infor--left">
                                        <span class="trending-tour-item__group-infor__rating--4star"></span>
                                        <div class="trending-tour-item__group-infor__lasting"><img src="assets/images/tours/lasting.png" alt="lasting"> 5 Days / 4 Nights</div>
                                    </div>

                                    <p class="trending-tour-item__group-infor__sale-price">$898</p>
                                    <span class="trending-tour-item__group-infor__price">$600</span>

                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-6 col-xl-4 col-sm-6 col-md-12">
                        <a href="tour-item.html" class="trending-tour-item">
                            <img class="trending-tour-item__thumnail" src="assets/images/uploads/destination/beach.jpg" alt="beach">
                            <div class="trending-tour-item__info">
                                <h3 class="trending-tour-item__name">
                                    Kelingking beach
                                </h3>
                                <div class="trending-tour-item__group-infor">
                                    <div class="trending-tour-item__group-infor--left">
                                        <span class="trending-tour-item__group-infor__rating--3star"></span>
                                        <div class="trending-tour-item__group-infor__lasting"><img src="assets/images/tours/lasting.png" alt="lasting"> 2 Days / 1 Nights</div>
                                    </div>
                                    <span class="trending-tour-item__group-infor__price">$432</span>

                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6 col-xl-4 col-sm-6 col-md-12">
                        <a href="tour-item.html" class="trending-tour-item">
                            <div class="trending-tour-item__sale"></div>
                            <img class="trending-tour-item__thumnail" src="assets/images/uploads/destination/tajmaha.jpg" alt="tajmaha">
                            <div class="trending-tour-item__info">
                                <h3 class="trending-tour-item__name">
                                    Taj Mahal tours
                                </h3>
                                <div class="trending-tour-item__group-infor">
                                    <div class="trending-tour-item__group-infor--left">
                                        <span class="trending-tour-item__group-infor__rating--4star"></span>
                                        <div class="trending-tour-item__group-infor__lasting"><img src="assets/images/tours/lasting.png" alt="lasting"> 5 Days / 4 Nights</div>
                                    </div>

                                    <p class="trending-tour-item__group-infor__sale-price">$510</p>
                                    <span class="trending-tour-item__group-infor__price">$410</span>

                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6 col-xl-4 col-sm-6 col-md-12">
                        <a href="tour-item.html" class="trending-tour-item">
                            <div class="trending-tour-item__sale"></div>
                            <img class="trending-tour-item__thumnail" src="assets/images/uploads/destination/seoul.jpg" alt="tajmaha">
                            <div class="trending-tour-item__info">
                                <h3 class="trending-tour-item__name">
                                    Yangpyeong Paragliding
                                </h3>
                                <div class="trending-tour-item__group-infor">
                                    <div class="trending-tour-item__group-infor--left">
                                        <span class="trending-tour-item__group-infor__rating--4star"></span>
                                        <div class="trending-tour-item__group-infor__lasting"><img src="assets/images/tours/lasting.png" alt="lasting"> 5 Days / 4 Nights</div>
                                    </div>

                                    <p class="trending-tour-item__group-infor__sale-price">$500</p>
                                    <span class="trending-tour-item__group-infor__price">$399</span>

                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- pagination -->
                <div class="wander-pagination__pagination">
                    <div class="wander-pagination__pagination__paging current">1</div>
                    <div class="wander-pagination__pagination__paging">2</div>
                    <div class="wander-pagination__pagination__paging">3</div>
                    <div class="wander-pagination__pagination__paging"><i class="fa fa-angle-right"></i></div>
                </div>

            </div>

        </div>
    </div>
</section>
@endsection
