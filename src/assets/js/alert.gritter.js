/**
 * Created by Skinka on 08.09.2015.
 */

gritterAdd = function ($title, $text, $class_name, $image, $options) {
    if ($options === undefined) {
        $option = {time:5000};
    }
    if ($image === undefined) {
        $image = '';
    }

    $.extend($.gritter.options, $options);
    $.gritter.add({title: $title, text: $text, image: $image, class_name: $class_name});
}