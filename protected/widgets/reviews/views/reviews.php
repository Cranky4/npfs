<?php
/**
 * Created by PhpStorm.
 * User: Cranky4
 * Date: 25.08.2015
 * Time: 22:44
 *
 * @var UserReview[] $reviews
 */
?>


<section>
    <div class="container">
        <h2 class="text-center">Отзывы</h2>

        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"><!-- Wrapper for slides -->
            <div class="carousel-inner">
                <?php for ($i = 0;
                           $i < count($reviews);
                           $i++): ?>
                    <div class="item <?= $i == 0 ? "active" : "" ?>">
                        <div class="testimonial-wrap">
                            <div class="row">
                                <?php if ($review = HArray::val($reviews, $i)): ?>
                                    <div class="col-md-6">
                                        <div class="copy center-block reviews">
                                            <div class="quote">
                                                <p><?= $review->text; ?></p>
                                            </div>
                                            <div class="student">
                                                <div class="photo">
                                                    <?php if ($src = $review->getPhotoPath()): ?>
                                                        <?= CHtml::image("/" . $src, $review->name) ?>
                                                    <?php endif; ?>
                                                </div>
                                                <p><?= $review->name ?></p>

                                                <p><?= $review->city ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if ($review = HArray::val($reviews, ++$i)): ?>
                                    <div class="col-md-6 hidden-sm hidden-xs">
                                        <div class="copy center-block reviews">
                                            <div class="quote">
                                                <p><?= $review->text; ?></p>
                                            </div>
                                            <div class="student">
                                                <div class="photo">
                                                    <?php if ($src = $review->getPhotoPath()): ?>
                                                        <?= CHtml::image("/" . $src, $review->name) ?>
                                                    <?php endif; ?>
                                                </div>
                                                <p><?= $review->name ?></p>

                                                <p><?= $review->city ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endfor; ?>
                <!--                <div class="item">-->
                <!--                    <div class="testimonial-wrap">-->
                <!--                        <div class="row">-->
                <!--                            <div class="col-md-6">-->
                <!--                                <div class="copy center-block reviews">-->
                <!--                                    <div class="quote">-->
                <!--                                        <p>&laquo;К нам на работу приходили агенты НПФ, что-то объясняли и долго-->
                <!--                                            уговаривали нас подписать договоры. Самый главный их аргумент был в том, что-->
                <!--                                            это Гос. Программа, но для меня все это было не убедительно. В наше время-->
                <!--                                            поверить людям на слово тяжело. Посмотрела на сайте и поняла, что это-->
                <!--                                            действительно так. Даже пожалела, что не заключила договор пару месяцев-->
                <!--                                            назад.&raquo;</p>-->
                <!--                                    </div>-->
                <!--                                    <div class="student">-->
                <!--                                        <div class="photo" id="anna"></div>-->
                <!--                                        <p>Мария</p>-->
                <!---->
                <!--                                        <p>Пермь</p>-->
                <!--                                    </div>-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                            <div class="col-md-6 hidden-sm hidden-xs">-->
                <!--                                <div class="copy center-block reviews">-->
                <!--                                    <div class="quote">-->
                <!--                                        <p>&laquo;Хочу сказать Спасибо! Я проживаю в районном центре. Информации очень-->
                <!--                                            мало. Пришла в ПФР, чтобы узнать про НПФ, а меня можно сказать &laquo;отфутболили&raquo;-->
                <!--                                            - показали стенд, где есть список НПФ &ndash; и все! Заключить договор я так-->
                <!--                                            и не смогла. Сервис Пенсия Онлайн помог мне это сделать. Теперь я спокойна-->
                <!--                                            за свои сбережения. За это им отдельное спасибо.&raquo;</p>-->
                <!--                                    </div>-->
                <!--                                    <div class="student">-->
                <!--                                        <div class="photo" id="elena"></div>-->
                <!--                                        <p>Елена</p>-->
                <!---->
                <!--                                        <p>Горнозаводск</p>-->
                <!--                                    </div>-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--                <div class="item">-->
                <!--                    <div class="testimonial-wrap">-->
                <!--                        <div class="row">-->
                <!--                            <div class="col-md-6">-->
                <!--                                <div class="copy center-block reviews">-->
                <!--                                    <div class="quote">-->
                <!--                                        <p>&laquo;Я очень рада! Мы с мужем искали информацию о гарантиях и куда НФП-->
                <!--                                            вкладывают деньги. Нашли эту информацию в доступном виде только на этом-->
                <!--                                            сайте. Спасибо всем тем людям, кто участвует в этом проекте. Все гораздо-->
                <!--                                            проще, чем мы себе представляли!&raquo;</p>-->
                <!--                                    </div>-->
                <!--                                    <div class="student">-->
                <!--                                        <div class="photo" id="tom"></div>-->
                <!--                                        <p>Анна</p>-->
                <!---->
                <!--                                        <p>Екатеринбург</p>-->
                <!--                                    </div>-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                            <div class="col-md-6 hidden-sm hidden-xs">-->
                <!--                                <div class="copy center-block reviews">-->
                <!--                                    <div class="quote">-->
                <!--                                        <p>&laquo;Интересно, а почему на сайтах НПФ нет такой информации? И зачем нужны-->
                <!--                                            агенты, если все и так доступно и просто? Зашел, все прочитал, уточнил-->
                <!--                                            нюансы и заключил договор. Скажу больше, сюда я зашел по рекомендации-->
                <!--                                            представителя НФП после того, как я замучил его вопросами. Недавно-->
                <!--                                            перезвонил ему и сказал спасибо за хороший контент о пенсии.&raquo;</p>-->
                <!--                                    </div>-->
                <!--                                    <div class="student">-->
                <!--                                        <div class="photo" id="evgenia"></div>-->
                <!--                                        <p>Евгений</p>-->
                <!---->
                <!--                                        <p>Владивосток</p>-->
                <!--                                    </div>-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </div>-->
            </div>
            <!-- Controls --> <a class="left carousel-contr" href="#carousel-example-generic" data-slide="prev"> <span
                    class="glyphicon glyphicon-chevron-left" data-mce-mark="1"></span> </a> <a
                class="right carousel-contr" href="#carousel-example-generic" data-slide="next"> <span
                    class="glyphicon glyphicon-chevron-right" data-mce-mark="1"></span> </a></div>
    </div>
</section>
