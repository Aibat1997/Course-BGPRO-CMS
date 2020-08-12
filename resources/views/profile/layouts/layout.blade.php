<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" />
    <title>Профиль</title>
    <link rel="stylesheet" href="/profile_vendor/css/libs.min.css">
    <link rel="stylesheet" href="/profile_vendor/css/main.css">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    @stack('css')
</head>

<body>
    @include('profile.layouts.header')
    @yield('content')
    <script src="/profile_vendor/js/libs.min.js"></script>
    <script type="text/javascript">
        // inspired by http://jsfiddle.net/arunpjohny/564Lxosz/1/
        $('.table-responsive-stack').find("th").each(function (i) {

            $('.table-responsive-stack td:nth-child(' + (i + 1) + ')').prepend('<span class="table-responsive-stack-thead">' + $(this).text() + ':</span> ');
            $('.table-responsive-stack-thead').hide();
        });

        $('.table-responsive-stack').each(function () {
            var thCount = $(this).find("th").length;
            var rowGrow = 100 / thCount + '%';
            //console.log(rowGrow);
            $(this).find("th, td").css('flex-basis', rowGrow);
        });

        function flexTable() {
            if ($(window).width() < 768) {

                $(".table-responsive-stack").each(function (i) {
                    $(this).find(".table-responsive-stack-thead").show();
                    $(this).find('thead').hide();
                });

                // window is less than 768px
            } else {


                $(".table-responsive-stack").each(function (i) {
                    $(this).find(".table-responsive-stack-thead").hide();
                    $(this).find('thead').show();
                });
            }
            // flextable
        }

        flexTable();
        window.onresize = function (event) {
            flexTable();
        };
    </script>
    <script src="/profile_vendor/js/common.js"></script>
    @stack('js')
</body>

</html>