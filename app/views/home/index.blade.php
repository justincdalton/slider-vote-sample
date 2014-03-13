<!DOCTYPE html>
<html>
    <head>
        <title>Code</title>

        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <section id="votes">
            <h3>Thumbs Up or Down</h3>
            <p>What do you think of this years' looks and styles on the red carpet? Vote below and let us know.</p>

            <?php foreach($images as $index=>$image) { ?>
                <div class="imageBlock {{ $index != 0 ? "hidden" : "" }}">
                    <div class="imageSlider">
                        <a class="prev" href="#">&lt;</a>
                        <img src="img/{{ $image->FileName }}" alt="{{ $image->Name }}" />
                        <a class="next" href="#">&gt;</a>
                    </div>
                    <div class="buttons"> 
                        <a class="thumb up" href="index.php/savevote/{{ $image->id }}/up">
                            <span class="img"></span>
                            <span class="text">LIKE</span>
                            <span class="percent">
                                {{ $image->getPercent("up") }}%
                            </span>
                        </a>
                        <a class="thumb down" href="index.php/savevote/{{ $image->id }}/down">
                            <span class="img"></span>
                            <span class="text">DISLIKE</span>
                            <span class="percent">
                                {{ $image->getPercent("down") }}%
                            </span>
                        </a>
                    </div>
                    <p>
                        <span class="count">
                            {{ ($index + 1)  }} of {{ count($images) }}
                        </span>
                        {{  $image->Caption }}
                    </p>
                </div>
            <?php } ?>
        </section>



        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src={{ URL::to("js/vendor/jquery-1.10.2.min.js") }}><\/script>')</script>
        <script src="{{ URL::to('js/main.js') }}"></script>

        <script>
            thumbs.init();
        </script>
    </body>
</html>
