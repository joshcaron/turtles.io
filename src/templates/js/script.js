$j = jQuery;

$j(document).ready(function() {
    $j("nav").click(function() {
        var menu = $j("nav ul");
        if (!$j(menu).is(":visible")) {
            $j(menu).show();
        } else {
            $j(menu).hide();
        }
    });
});