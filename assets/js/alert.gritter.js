/**
 * Created by Skinka on 08.09.2015.
 */

gritterAdd = function ($title, $text, $class_name, $image, $sticky, $options) {
    if ($options === undefined) {
        $option = {time:5000};
    }
    if ($image === undefined) {
        $image = '';
    }
    if ($sticky === undefined) {
        $sticky = false;
    }
    $.extend($.gritter.options, $options);
    $.gritter.add({title: $title, text: $text, image: $image, sticky: $sticky, class_name: $class_name});
}