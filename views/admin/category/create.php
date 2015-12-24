<form action="create" method="post">
    <input type="text" name="name">
    <select name="parent_id">
        <option>-- нету --</option>
        <? foreach($categories as $category) { ?>
            <option value="<?=$category->id?>">
                <?=$category->name?>
            </option>
        <? } ?>
    </select>

    <input type="submit" value="Create">
</form>