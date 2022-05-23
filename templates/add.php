<main>
    <nav class="nav">
        <ul class="nav__list container">
            <?php foreach ($categories as $category) {?>
                <li class="nav__item">
                    <a href="all-lots.html"><?php echo $category["category_name"]?></a>
                </li>
            <?php } ?>
        </ul>
    </nav>
    <form class="form form--add-lot container form--invalid" action="add.php" method="post"> <!-- form--invalid -->
        <h2>Добавление лота</h2>
        <div class="form__container-two">
            <div class="form__item <?php if (isset($form_errors['goods_name'])): ?> form__item--invalid <?php endif;?>"> <!-- form__item--invalid -->
                <label for="lot-name">Наименование <sup>*</sup></label>
                <input id="lot-name" type="text" name="goods_name" placeholder="Введите наименование лота">
                <span class="form__error"><?php if(isset($form_errors['goods_name'])):?><?php echo $form_errors['goods_name'];?><?php endif; ?></span>
            </div>
            <div class="form__item <?php if (isset($form_errors['category_name'])): ?> form__item--invalid <?php endif; ?>">
                <label for="category">Категория <sup>*</sup></label>
                <select id="category" name="category_name">
                    <option>Выберите категорию</option>
                    <?php foreach ($categories as $category) { ?>
                    <option><?php echo $category["category_name"]?></option>
                    <?php } ?>
                </select>
                <span class="form__error"><?php if(isset($form_errors['category_name'])):?><?=$form_errors['category_name'];?><?php endif; ?></span>
            </div>
        </div>
        <div class="form__item form__item--wide <?php if (isset($form_errors['goods_info'])): ?>form__item--invalid<?php endif;?>">
            <label for="message">Описание <sup>*</sup></label>
            <textarea id="message" name="goods_info" placeholder="Напишите описание лота"></textarea>
            <span class="form__error"><?php if(isset($form_errors['goods_info'])):?><?=$form_errors['goods_info'];?><?php endif; ?></span>
        </div>
        <div class="form__item form__item--file">
            <label>Изображение <sup>*</sup></label>
            <div class="form__input-file">
                <input class="visually-hidden" type="file" id="lot-img" name="goods_img" value=""> <!-- тут может быть косяк-->
                <label for="lot-img">
                    Добавить
                </label>
            </div>
            <!-- возможен <span></span> -->
        </div>
        <div class="form__container-three">
            <div class="form__item form__item--small <?php if (isset($form_errors['goods_price'])): ?>form__item--invalid<?php endif;?>">
                <label for="lot-rate">Начальная цена <sup>*</sup></label>
                <input id="lot-rate" type="text" name="goods_price" placeholder="0">
                <span class="form__error"><?php if(isset($form_errors['goods_price'])):?><?=$form_errors['goods_price'];?><?php endif; ?></span>
            </div>
            <div class="form__item form__item--small <?php if (isset($form_errors['goods_bid'])): ?>form__item--invalid<?php endif;?>">
                <label for="lot-step">Шаг ставки <sup>*</sup></label>
                <input id="lot-step" type="text" name="goods_bid" placeholder="0">
                <span class="form__error"><?php if(isset($form_errors['goods_bid'])):?><?=$form_errors['goods_bid'];?><?php endif; ?></span>
            </div>
            <div class="form__item <?php if (isset($form_errors['goods_date_end'])): ?>form__item--invalid<?php endif;?>">
                <label for="lot-date">Дата окончания торгов <sup>*</sup></label>
                <input class="form__input-date" id="lot-date" type="text" name="goods_date_end" placeholder="Введите дату в формате ГГГГ-ММ-ДД">
                <span class="form__error"><?php if(isset($form_errors['goods_date_end'])):?><?=$form_errors['goods_date_end'];?><?php endif; ?></span>
            </div>
        </div>
        <span class="form__error form__error--bottom"><?php if(count($form_errors) > 0):?>Пожалуйста, исправьте ошибки в форме.<?php endif; ?></span>
        <button type="submit" class="button">Добавить лот</button>
    </form>
</main>
