<?php
function getFolderPath($recipe) {
    $combine_titles = $recipe["title"]."_".$recipe["sub_title"];
    $has_AND_sign = strpos($combine_titles, "&");

    if ($has_AND_sign === false) {
        $no_spaces_combined_title = str_replace(" ","_", $combine_titles);
    } else {
        $refined_combined_title = str_replace(" & ","_", $combine_titles);
        $no_spaces_combined_title = str_replace(" ","_", $refined_combined_title);
        }
    
    
    $folder_name = "Recipe_".$no_spaces_combined_title;
    $folder_name = str_replace(array("'", ","),"", $folder_name);
    return $folder_name;
}
?>