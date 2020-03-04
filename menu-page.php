<?php
  
    if(isset($_POST['line-color'], $_POST['substrates-color'], $_POST['position'])){
        $lineColor = $_POST['line-color'];
        $substratesColor = $_POST['substrates-color'];
        $position = $_POST['position'];
        update_option( 'page-scroll-progress-line-color', $lineColor );
        update_option( 'page-scroll-progress-substrates-color', $substratesColor );
        update_option( 'page-scroll-progress-position', $position );
    }

    $lineColor = get_option('page-scroll-progress-line-color');
    $substratesColor = get_option('page-scroll-progress-substrates-color');
    $position = get_option('page-scroll-progress-position');

?>

<div class="wrap">
    <h1><?= __('Page Scroll Progress Settings',  'page-scroll-progress');?></h1>
    <form method="POST">
        <table class="form-table"
               role="presentation">
            <tbody class="form-table"
                   role="presentation">
            <tbody>
                <tr>
                    <th scope="row"><label
                               for="line_color"><?= __('Line color','page-scroll-progress')?></label>
                    </th>
                    <td><input name="line-color"
                               type="color"
                               id="line_color"
                               value="<?=$lineColor;?>"
                               class="regular-text ltr">
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label
                               for="substrates_color"><?= __('Substrates color','page-scroll-progress')?></label>
                    </th>
                    <td><input name="substrates-color"
                               type="color"
                               id="substrates_color"
                               value="<?=$substratesColor;?>"
                               class="regular-text ltr">
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label
                               for="position"><?= __('Position','page-scroll-progress')?></label>
                    </th>
                    <td>
                        <select name="position"
                                id="position">
                            <option value="top"
                                    <?= $position == 'top' ? ' selected="selected"' : ''; ?>>
                                <?= __('Top','page-scroll-progress')?>
                            </option>
                            <option value="right"
                                    <?= $position == 'right' ? ' selected="selected"' : ''; ?>>
                                <?= __('Rigth','page-scroll-progress')?></option>
                            <option value="bottom"
                                    <?= $position == 'bottom' ? ' selected="selected"' : ''; ?>>
                                <?= __('Bottom','page-scroll-progress')?>
                            </option>
                            <option value="left"
                                    <?= $position == 'left' ? ' selected="selected"' : ''; ?>>
                                <?= __('Left','page-scroll-progress')?></option>
                        </select>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="submit">
            <input type="submit"
                   name="submit"
                   id="submit"
                   class="button button-primary"
                   value="<?= __('Save Changes','page-scroll-progress')?>">
        </p>
    </form>
</div>