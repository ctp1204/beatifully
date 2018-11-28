<a href="#top" class="to-top"><i class ="glyphicon glyphicon-chevron-up"></i></a>
        <style>
            .to-top{
                display: inline-block;
                position: fixed;
                bottom: 20px;
                right: 20px;
                background: #000;
                color: #fff;
                padding: 9px 12px;
                border-radius: 50%;
                cursor: pointer;
            }
            .to-top:hover{
                background: #d7d7d7;
                color: #000;
            }
        </style>
        <script>
            $(document).ready(function(){
                var offset = 250;
                var duration = 500;

                $(window).scroll(function(){
                    if($(this).scrollTop() > offset){
                        $('.to-top').fadeIn(duration);
                    }else{
                        $('.to-top').fadeOut(duration);
                    }
                });
            });
        </script>