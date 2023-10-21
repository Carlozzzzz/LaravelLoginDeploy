    
    {{-- Jquery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    
    <script>
        $(document).ready(function() {
            $('#navToggler').click(() => {
                $('#headerLinks').toggle();
            });

            // Screen change
            $(window).resize(function() { 
                if ($(window).width() >= 768) {
                    $('#headerLinks').show();
                } else {
                    $('#headerLinks').hide();
                }
            }); 
        });
    </script>


    </body>
</html>
