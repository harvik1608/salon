<h3><?php echo $service_group_name; ?> <span class="total_item">(Total service in your cart : <?php echo $total_item_in_cart; ?>)</span><a id="your_cart" class="read_btn"><small>Checkout</small></a></h3><br>
<?php 
    if(!empty($services)) {
?>
        <div class="table-responsive">
            <table class="table table-bordered" style="width:100%">
                <tbody>
                    <?php
                        foreach($services as $service) {
                            $multiple = addslashes($service['json']);
                            $ser_name = addslashes($service['name']);
                    ?>
                            <tr>
                                <td width="25%">
                                    <?php
                                        if($service['price_type'] == 0) {
                                            $single_fields = $service["price_json"];    
                                            if(!empty($single_fields))  {
                                                foreach($single_fields as $sfield) {
                                                    if($sfield['retail_price'] != "") {
                                                        $sprice = $sfield['special_price'];
                                                        $rprice = $sfield['retail_price'];
                                                        if($sprice == $rprice) {
                                                            $price = $sprice;   
                                                            $service_price = $sprice;   
                                                        } else if($rprice != "" && $sprice == "") {
                                                            $price = $rprice;
                                                            $service_price = $rprice;   
                                                        } else if($rprice != "" && $sprice != "") {
                                                            $price = $sprice." <small><strike>".$rprice."</strike></small>"; 
                                                            $service_price = $sprice;   
                                                        } else {
                                                            $price = $rprice;
                                                            $service_price = $rprice;   
                                                        }
                                                    }
                                    ?>
                                                    <!-- <a href="javascript:;" onclick="add_to_cart('<?php echo $service['id']; ?>','<?php echo $sfield['id']; ?>','<?php echo $service['name']; ?>','<?php echo $sfield['caption']; ?>','<?php echo $service_price; ?>','<?php echo $sfield['duration']; ?>','<?php echo $flag; ?>','<?php echo $rprice; ?>','<?php echo $sprice; ?>');">
                                                    <small></small>
                                                </a> -->
                                    <?php

                                                }
                                    ?>
                                                <a class="service-title"><small><?php echo $service['name']; ?></small></a>
                                    <?php
                                            }
                                        } else {
                                    ?>
                                            <a class="service-title"><small><?php echo $service['name']; ?></small></a>
                                    <?php   
                                        } 
                                    ?>
                                </td>
                                <?php
                                    // if($service['json'] != "")
                                    // {
                                        $fields = $service["price_json"];
                                        if(!empty($fields))
                                        {
                                            foreach($fields as $field)
                                            {
                                                if($field['retail_price'] != "") 
                                                {
                                                    $sprice = $field['special_price'];
                                                    $rprice = $field['retail_price'];
                                                    if($sprice == $rprice) {
                                                        $price = $sprice;   
                                                        $service_price = $sprice;   
                                                    } else if($rprice != "" && $sprice == "") {
                                                        $price = $rprice;
                                                        $service_price = $rprice;   
                                                    } else if($rprice != "" && $sprice != "") {
                                                        $price = $sprice." <small><strike>".$rprice."</strike></small>"; 
                                                        $service_price = $sprice;   
                                                    } else {
                                                        $price = $rprice;
                                                        $service_price = $rprice;   
                                                    }
                                ?>
                                                    <td align="center" valign="middle" style="font-size: 11px;cursor: pointer;" onclick="add_to_cart('<?php echo $service['id']; ?>','<?php echo $field['id']; ?>','<?php echo $service['name']; ?>','<?php echo $field['caption']; ?>','<?php echo $service_price; ?>','<?php echo $field['duration']; ?>','<?php echo $flag; ?>','<?php echo $rprice; ?>','<?php echo $sprice; ?>');">
                                                        <?php
                                                            if($field['caption'] == "")
                                                            {
                                                        ?>
                                                                <div class="price_cell">
                                                                    <span class="price-caption"><?php echo $currency." ".$price; ?></span>
                                                                </div>
                                                        <?php
                                                            } else {
                                                        ?>
                                                                <div class="price_cell">
                                                                    <p class="price_caption"><?php echo $field['caption']; ?></p>
                                                                    <span class="btn-sm price-caption"><?php echo $currency; ?> <?php echo $price; ?></span>
                                                                </div>
                                                        <?php
                                                            }
                                                        ?>
                                                    </td>
                                <?php
                                                }
                                            }
                                        }
                                    // } 
                                ?>
                            </tr>
                    <?php
                        } 
                    ?>
                </tbody>
            </table>
        </div>
<?php
    }
?>
