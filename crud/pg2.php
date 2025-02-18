<div class="pg2">
            <div class="containerpg">
                <span>
                    <!-- <div class="index">
                        <a href="#">1</a>
                    </div>
                    <div class="index">2</div>
                    <div class="index">3</div>
                    <div class="index">4</div>
                    <div class="index">5</div> -->
                    <?php

                        for($counter = 1; $counter <= $pages; $counter ++){
                            ?>

                                <!-- <li>
                                    <a href="?page-nr=<?php echo $counter ?>"><?php echo $counter?></a>
                                </li> -->

                                <div class="index">
                                <a href="?page-nr=<?php echo $counter ?>"><?php echo $counter?></a>
                                </div>

                            <?php
                        }

                    ?>
                </span>
                <svg viewBox="0 0 100 100">
                <path
                        d="m 7.1428558,49.999998 c -1e-7,-23.669348 19.1877962,-42.8571447 42.8571442,-42.8571446 23.669347,0 42.857144,19.1877966 42.857144,42.8571446" />
                </svg>
                <svg viewBox="0 0 100 100">
                <path
                        d="m 7.1428558,49.999998 c -1e-7,23.669347 19.1877962,42.857144 42.8571442,42.857144 23.669347,0 42.857144,-19.187797 42.857144,-42.857144" />
                </svg>
            </div>
        </div>