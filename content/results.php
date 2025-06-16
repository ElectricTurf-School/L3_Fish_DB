<?php
$sql_conditions = $search_conditions ?? "";
[$find_query, $find_count] = get_data($dbconnect, $sql_conditions);
echo "<h1>All Results $find_count</h1>";

?> <div class="results"><?php
while ($find_rs = mysqli_fetch_assoc($find_query)) {
    ?>

    <div class="result" id="<?php echo $find_rs['ID']?>_result">
        <span style="position: absolute; width: 100%; height: 2px; top: 128px; filter: drop-shadow(0px 0px 4px black); background: linear-gradient(45deg, #ffffff00, #ffffff52, #00d6ff2e);"></span>
        <div style="position: absolute; bottom: 3px; left: 3px; display: flex; height: 30px; font-family: cursive; gap: 5px;">
           <a href="?page=search&action=country&quick_search=<?php echo $find_rs['native']?>" style="all: unset; display: inline-flex; align-items: center; cursor: pointer; ">
                <span style="margin-left: 1px; background: #ffffff8c; border: solid 1px gray; border-radius: 8px; padding: 2px 2px;">🌍<i>Native: <?php echo $find_rs['native']?></i></span>
            </a>

            <?php if ($find_rs['saltwater'] == 1) {echo('<span style="margin-left: 1px; background: #ffffff8c; border: solid 1px gray; border-radius: 8px; padding: 2px 2px;">🧂<i>Salt</i></span>');} ?>
        </div>
        <?php 
            $code = $find_rs['design_hex'];
            $map = [
                'T' => 'type',
                'D' => 'rotation',
                'L' => 'loops',
                'W' => 'loopwidth',

            ];
            $type = [
                // Type ID => [Gradient-Type, Include-deg]
                1 => ['linear-gradient', 1],
                2 => ['repeating-linear-gradient', 1],
                3 => ['radial-gradient', 0],
                4 => ['repeating-radial-gradient', 0]
            ];

            $code = $find_rs['design_hex'];
            $result = [];
            $len = strlen($code);
            $i = 0;
            $puzzle = '';
            $puzzle_map = null;
            while ($i < $len) {
                $letter = $code[$i];
                $i += 1;
                // T1 = Linear
                // T2 = Repeating
                // T3 = Radical
                if (isset($map[$letter])) {
                    if ($puzzle_map !== null) {
                        $result[$puzzle_map] = $puzzle;
                    }
                    $puzzle_map = $map[$letter];
                    $puzzle = '';
                } else {
                    $puzzle .= $letter;
                }
            }
            
            if ($puzzle_map !== null && $puzzle !== '') {
                $result[$puzzle_map] = $puzzle;
            }
            $color = '';
            $color1 = $find_rs['color1']; 
            $color2 = $find_rs['color2'];
            
            if (!isset($color2) || $color2 == 'NULL') {
                $color = $color1;
            }
            else {
                // Design fish from design HEX 
                // [Lineartype]([[rotation]deg, ?? ''] [color1], [color1], [color2], [color2] [loops] [[loopwidth]px ?? '']) 
                $color = ($type[$result['type'] ?? 1][0]) . '(' . 
                (($type[$result['type'] ?? 1][1] ? ($result['rotation'] ?? '90') . 'deg, ' : '')) . 
                "$color1, $color1, $color2, $color2" . 
                (isset($result['loops']) ? ' ' . $result['loops'] . 'px' : '') . 
                (isset($result['loopwidth']) ? ' ' . $result['loopwidth'] . 'px' : '') . 
                ')';
            }
            
        ?>
        <div style="width: 130px; height: 130px; display: inline-block; grid-area: thumb;">
            <div style="background-color: #00000020; border-radius: 6px 0 29px 0; width: 100%; height: 100%;">

                <img src="https://projectspace.nz/amyxrilg/DTI301/L3_Fish_DB/images/FishBG-icon.png" style="filter: drop-shadow(0px 0px 2px #05FF62) <?php echo ($find_rs['saltwater'] ? 'hue-rotate(320deg)' : ''); ?>; width: 90%; height: 90%; left: 3.5%; top: 2.5%; position: relative;">
                
                <div class="fish-icon" style="background: <?php echo $color; ?>; width: 85%; height: 50%; left: 7%; top: -63.5%; position: relative;"></div>
                <img style="width: 85%; height: 36%; left: 7%; top: -106.5%; position: relative;" src="https://projectspace.nz/amyxrilg/DTI301/L3_Fish_DB/images/Fish_Icon.png">
            </div>
        </div>

        
        <span id="<?php echo $find_rs['ID']?>_name" style="padding-left: 4px; grid-area: name; text-align: left; position: relative; height: 100%; overflow-wrap: normal; overflow-y: auto;"><b><?php echo $find_rs['name'];?></b></span>
        <span id="sci-name" style="grid-area: sci-name; padding-left: 4px; height: max-content; font-size: small;"><?php echo $find_rs['sci_name'] ?></span>
        <span style="grid-area: description-box; height: 100%; font-family: cursive; font-weight: bold;"><?php echo $find_rs['description'] ?></span>
        <span style="grid-area: lifetime; display: flex; align-items: center; padding-left: 15%;">
            <span>0 Years</span> 
            <div style="width: 70%; height: 160px; rotate: 180deg; margin: 5px; position: relative; display: flex; justify-content: center; align-items: center;">
                <p style="position: absolute; z-index: 2; margin: 0; rotate: 180deg; top: 85px; padding-right: 25px;">This fish lives around</p>
                <img style="width: 100%; height: 100%; filter: invert(1); " src="https://projectspace.nz/amyxrilg/DTI301/L3_Fish_DB/images/arrow.png">
            </div>
            
            <span><?php echo $find_rs['avr_life']; ?> Years</span>
        </span>





    </div>
    
    <?php
}            
?> </div> <!-- Results -->