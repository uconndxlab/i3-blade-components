@include('i3::components._styles')

<div {{ $attributes->merge(['class' => 'uconn-banner uconn-banner-' . $framework]) }}>
    <div class="uconn-banner-content">
        <a href="https://www.uconn.edu/" rel="noopener noreferrer">
            <svg version="1.1" id="svg2" width="672.03998" height="141.12" viewBox="0 0 672.03998 141.12"
                xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg">
                <defs id="defs6" />
                <g id="g8" transform="matrix(1.3333333,0,0,-1.3333333,0,141.12)">
                    <g id="g10" transform="scale(0.1)">
                        <path
                            d="m 667.273,227.109 c -67.98,-19.925 -137.738,-44.808 -222.425,-44.808 -84.645,0 -154.368,24.883 -222.375,44.808 V 1027.21 H 0 V 115.906 C 121.227,44.5195 275.586,1.39844 444.848,1.39844 612.52,1.39844 768.57,44.5195 889.766,115.906 V 1027.21 H 667.273 V 227.109"
                            style="fill:#ffffff;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path12" />
                        <path
                            d="M 1708.45,831.258 V 683.527 h 222.46 v 259 c -121.17,71.363 -275.57,112.843 -444.82,112.843 -167.67,0 -322.03,-41.48 -443.16,-112.843 V 114.246 C 1164.06,44.5195 1318.42,3.03125 1486.09,3.03125 c 169.25,0 323.65,41.48825 444.82,111.21475 V 416.301 H 1708.45 V 227.109 c -66.4,-19.925 -137.65,-31.472 -222.36,-31.472 -84.64,0 -154.37,11.547 -220.8,31.472 v 604.149 c 66.43,20.012 136.16,31.625 220.8,31.625 84.71,0 155.96,-11.613 222.36,-31.625"
                            style="fill:#ffffff;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path14" />
                        <path
                            d="m 2755.77,227.109 c -68.06,-19.925 -137.72,-31.472 -222.44,-31.472 -84.62,0 -154.29,11.547 -222.38,31.472 v 604.149 c 68.09,21.644 137.76,31.625 222.38,31.625 84.72,0 154.38,-11.613 222.44,-31.625 z M 2088.43,944.102 V 114.246 C 2209.72,44.5195 2364.05,3.03125 2533.33,3.03125 c 167.67,0 323.7,41.48825 444.85,111.21475 v 829.856 c -121.15,69.788 -275.53,111.268 -444.85,111.268 -167.62,0 -323.61,-41.48 -444.9,-111.268"
                            style="fill:#ffffff;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path16" />
                        <path
                            d="m 3807.3,321.777 h -5.03 L 3360.72,1027.21 H 3123.4 V 32.9102 h 200.87 V 738.375 h 6.59 L 3772.34,32.9102 h 237.41 V 1027.21 H 3807.3 V 321.777"
                            style="fill:#ffffff;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path18" />
                        <path
                            d="m 4837.77,321.777 h -4.99 L 4391.3,1027.21 H 4153.88 V 32.9102 h 200.9 V 738.375 h 6.55 l 441.5,-705.4648 h 237.43 V 1027.21 H 4837.77 V 321.777"
                            style="fill:#ffffff;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path20" />
                    </g>
                </g>
            </svg>
        </a>

        <div class="uconn-banner-text">
            UNIVERSITY OF CONNECTICUT
        </div>

        <div class="buttons">
            <a href="https://uconn.edu/search/" class="uconn-banner-button" rel="noopener noreferrer">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 32 32" aria-hidden="true" class="banner-icon">
                    <title>Search UConn</title>
                    <path d="M28.072 24.749l-6.046-6.046c0.912-1.499 1.437-3.256 1.437-5.139 0-5.466-4.738-10.203-10.205-10.203-5.466 0-9.898 4.432-9.898 9.898 0 5.467 4.736 10.205 10.203 10.205 1.818 0 3.52-0.493 4.984-1.349l6.078 6.080c0.597 0.595 1.56 0.595 2.154 0l1.509-1.507c0.594-0.595 0.378-1.344-0.216-1.938zM6.406 13.258c0-3.784 3.067-6.853 6.851-6.853 3.786 0 7.158 3.373 7.158 7.158s-3.067 6.853-6.853 6.853-7.157-3.373-7.157-7.158z"></path>
                </svg>               
            </a>
            <a href="https://uconn.edu/az-index/" class="uconn-banner-button" rel="noopener noreferrer">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 32 32" aria-hidden="true">
                    <title>UConn A to Z Index</title>
                    <path d="M5.345 8.989h3.304l4.944 13.974h-3.167l-0.923-2.873h-5.147l-0.946 2.873h-3.055l4.989-13.974zM5.152 17.682h3.579l-1.764-5.499-1.815 5.499zM13.966 14.696h5.288v2.56h-5.288v-2.56zM20.848 20.496l7.147-9.032h-6.967v-2.474h10.597v2.341l-7.244 9.165h7.262v2.466h-10.798v-2.466h0.004z">
                    </path>
                </svg>             
            </a>
        </div>

    </div>

</div>
