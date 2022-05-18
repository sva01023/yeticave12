<section class="promo">
    <h2 class="promo__title">Нужен стафф для катки?</h2>
    <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
    <ul class="promo__list">
        <!--заполните этот список из массива категорий-->
        <?php foreach($categories as $category) { ?>
            <li class="promo__item promo__item--boards">
                <a class="promo__link" href="pages/all-lots.html"><?php echo $category["category_name"]?></a>
            </li>
        <?php } ?>
    </ul>
</section>
<section class="lots">
    <div class="lots__header">
        <h2>Открытые лоты</h2>
    </div>
    <ul class="lots__list">
        <!--заполните этот список из массива с товарами-->
        <?php foreach ($goods as $g) { ?>
            <li class="lots__item lot">
                <div class="lot__image">
                    <img src="<?php echo $g['goods_img']?>" width="350" height="260" alt="">
                </div>
                <div class="lot__info">
                    <span class="lot__category"><?php echo $g['category_name']?></span>
                    <h3 class="lot__title"><a class="text-link" href="pages/lot.html"><?php echo $g['goods_name']?></a></h3>
                    <div class="lot__state">
                        <div class="lot__rate">
                            <span class="lot__amount">Стартовая цена</span>
                            <span class="lot__cost"><?php echo price($g['goods_price'])?></span>
                        </div>
                        <div class="lot__timer timer">
                            <?php echo data_end() ?>
                        </div>
                    </div>
                </div>
            </li>
        <?php } ?>
    </ul>
</section>
