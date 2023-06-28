@extends('layout.main')

@section('container')
    <section>
        <h1 class="text-center">Sundanese Honorific Checker</h1>
        <div class="container-fluid main-translate">
            <div class="content">
                <div class="col-6 kiri">
                        <div class="ttl 1">
                            <!-- <div class="left title">Sunda Loma</div> -->
                            <div class="left dd">
                                <select id="src" name="dropdown" id="dropdown">
                                    <option value="loma">Sunda Loma</option>
                                    <option value="sorangan">Sunda Lemes (Sorangan)</option>
                                    <option value="batur">Sunda Lemes (Batur)</option>
                                    <option value="indonesia" selected>Indonesia</option>
                                </select>
                            </div>
                        </div>
                    <form class="translate-kiri">
                        <textarea id="input" class="input-field" rows="4" placeholder="Type or&#10;paste text to&#10;translate..."></textarea>
                    </form>
                </div>

                <div class="tengah">
                    <button class="btn btn-dark" onClick="swap()"><img src="{{ asset("img/change.png") }}" class="mx-auto d-block" width="30px"></button>
                    <span class="vertical-line"></span>
                </div>

                <div class="col-6 kanan">
                    <div class="ttl 2">
                        <!-- <div class="right title">Sunda Lemes</div> -->
                        <div class="right dd">
                            <select id="dst" name="dropdown" id="dropdown">
                                <option value="loma">Sunda Loma</option>
                                <option value="sorangan" selected>Sunda Lemes (Sorangan)</option>
                                <option value="batur">Sunda Lemes (Batur)</option>
                                <option value="indonesia">Indonesia</option>
                            </select>
                        </div>
                    </div>

                    <form method="POST" class="translate-kiri">
                        @csrf
                        <textarea id="output" class="input-field" rows="4" placeholder="Your&#10;translation&#10;here...."></textarea>
                    </form>
                </div>
            </div>
    </section>
    <script type="module">
        var input = document.getElementById('input');
        var output = document.getElementById('output');
        var src = document.getElementById('src');
        var dst = document.getElementById('dst');

        input.addEventListener('change', function(){
            fetch('/translation?text=' + input.value + '&from=' + src.value + '&to=' + dst.value)
                .then(response => response.json())
                .then(data => output.value = data.after);
        });

        output.addEventListener('change', function(){
            fetch('/translation?text=' + output.value + '&from=' + dst.value + '&to=' + src.value)
                .then(response => response.json())
                .then(data => input.value = data.after);
        });

        src.addEventListener('change', function(){
            fetch('/translation?text=' + input.value + '&from=' + src.value + '&to=' + dst.value)
                .then(response => response.json())
                .then(data => output.value = data.after);
        });

        dst.addEventListener('change', function(){
            fetch('/translation?text=' + input.value + '&from=' + src.value + '&to=' + dst.value)
                .then(response => response.json())
                .then(data => output.value = data.after);
        });
    </script>
    <script>
        var select1 = select = document.getElementById( 'src' );
        var select2 = select = document.getElementById( 'dst' );

        select1.onchange = function() {
            preventDupes.call(this, select2, this.selectedIndex );
        };

        select2.onchange = function() {
            preventDupes.call(this, select1, this.selectedIndex );
        };

        function preventDupes( select, index ) {
            var options = select.options,
                len = options.length;
            while( len-- ) {
                options[ len ].disabled = false;
            }
            select.options[ index ].disabled = true;
            if( index === select.selectedIndex ) {
                alert('You\'ve already selected the item "' + select.options[index].text + '".\nPlease choose another.');
                this.selectedIndex = 0;
            }
        };

        function swap(){
            var second = document.getElementById("src");
            var secondContent = document.getElementById("input");
            var first = document.getElementById("dst");
            var firstContent = document.getElementById("kanan");

            var temp;
            temp = second.value;
            second.value = first.value;
            first.value = temp;

            temp = secondContent.value;
            secondContent.value = firstContent.value;
            firstContent.value = temp;

        };
    </script>
@endsection

    