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
    <form class="form form--add-lot container <?echo $form_errors ? 'form--invalid':''?>" action="../add.php" method="post" enctype="multipart/form-data"> <!-- form--invalid -->
        <h2>Добавление лота</h2>
        <div class="form__container-two">
            <div class="form__item <?echo in_array('1',$form_errors) ? 'form__item--invalid':'' ?>"> <!-- form__item--invalid -->
                <label for="goods_name">Наименование <sup>*</sup></label>
                <input id="goods_name" type="text" name="goods_name" placeholder="Введите наименование лота" value="<?=@$_POST['goods_name']?>">
                <span class="form__error">Введите наименование лота</span>
            </div>
            <div class="form__item">
                <label for="category_name">Категория <sup>*</sup></label>
                <select id="category_name" name="category_name">
                    <?php
                    $i = 1;
                    foreach ($categories as $category)
                    {
                        echo '<option value="'.$i.'">'.$category['category_name'].'</option>';
                        $i++;
                    } ?>
                </select>
                <span class="form__error">Выберите категорию</span>
            </div>
        </div>
        <div class="form__item form__item--wide <?echo in_array('2',$form_errors) ? 'form__item--invalid':'' ?>">
            <label for="message">Описание <sup>*</sup></label>
            <textarea id="message" name="goods_info" placeholder="Напишите описание лота"><?=@$_POST['goods_info']?></textarea>
            <span class="form__error">Напишите описание лота</span>
        </div>
        <div class="form__item form__item--file <?echo in_array('3',$form_errors) ? 'form__item--invalid':'' ?>">
            <label>Изображение <sup>*</sup></label>
            <div class="form__input-file">
                <input class="visually-hidden" type="file" id="image" name="image" value="<?=@$_FILES['image']['name']?>"> <!-- тут может быть косяк-->
                <label for="image">
                    Добавить
                </label>
            </div>
            <span class="form__error">Выберите файл</span>
        </div>
        <div class="form__container-three">
            <div class="form__item form__item--small <?echo in_array('4',$form_errors) ? 'form__item--invalid':'' ?>">
                <label for="lot-rate">Начальная цена <sup>*</sup></label>
                <input id="lot-rate" type="text" name="goods_price" placeholder="0" value="<?=@$_POST['goods_price']?>">
                <span class="form__error">Введите начальную цену</span>
            </div>
            <div class="form__item form__item--small <?echo in_array('5',$form_errors) ? 'form__item--invalid':'' ?>">
                <label for="lot-step">Шаг ставки <sup>*</sup></label>
                <input id="lot-step" type="text" name="goods_bid" placeholder="0" value="<?=@$_POST['goods_bid']?>">
                <span class="form__error">Введите шаг ставки</span>
            </div>
            <div class="form__item <?echo in_array('6',$form_errors) ? 'form__item--invalid':'' ?>">
                <label for="lot-date">Дата окончания торгов <sup>*</sup></label>
                <input class="form__input-date" id="lot-date" type="date" name="goods_date_end" placeholder="Введите дату в формате ГГГГ-ММ-ДД" value="<?=@$_POST['goods_date_end']?>">
                <span class="form__error">Введите дату завершения торгов</span>
            </div>
        </div>
        <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
        <button type="submit" class="button">Добавить лот</button>
    </form>
</main>
