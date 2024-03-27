<script>
    var variantCount = <?=(isset($productsColorsandsize['mau'])&&is_array($productsColorsandsize['mau']))?sizeof($productsColorsandsize['mau']):'1';?>; // Đặt variantCount ở ngoài hàm để có thể sử dụng chung cho cả hai hàm
    function addVariant() {
        ++variantCount;
        var variantDiv = document.createElement("div");
        variantDiv.classList.add("variant");
        variantDiv.id = `variants_${variantCount}`;
        variantDiv.innerHTML = `
                <div class="d-flex">
                    <div class="col-md-5">
                        <label>Màu sắc:</label>
                        <input type="color" placeholder="Màu sắc" name="variant[${variantCount}][mau]">
                    </div>
                     <div class="d-flex justify-content-center col-md-6">
                        <label>Size:</label>
                        <div class="mr-2 col-md-3">
                            <div class="d-flex">
                                <input type="checkbox" id="variant_size_${variantCount}_S" name="variant[${variantCount}][size][S][]" onclick="showQuantityInput(${variantCount}, 'S')" value="S">S
                            </div>
                            <div id="soluongsize_${variantCount}_S" style="display: none;">
                                <label >Số lượng:</label>
                                <input type="text" class=" w-100" name="variant[${variantCount}][size][S][]" id="">
                            </div>
                        </div>
                        <div class="mr-2 col-md-3">
                            <div class="d-flex">
                                <input type="checkbox" id="variant_size_${variantCount}_M" name="variant[${variantCount}][size][M][]" onclick="showQuantityInput(${variantCount}, 'M')" value="M">M
                            </div>
                            <div id="soluongsize_${variantCount}_M" style="display: none;">
                                <label >Số lượng:</label>
                                <input type="text" class=" w-100" name="variant[${variantCount}][size][M][]" id="">
                            </div>
                        </div>
                        <div class="mr-2 col-md-3">
                            <div class="d-flex">
                                <input type="checkbox" id="variant_size_${variantCount}_L" name="variant[${variantCount}][size][L][]" onclick="showQuantityInput(${variantCount}, 'L')" value="L">L
                            </div>
                            <div id="soluongsize_${variantCount}_L" style="display: none;">
                                <label >Số lượng:</label>
                                <input type="text" class=" w-100" name="variant[${variantCount}][size][L][]" id="">
                            </div>
                        </div>
                        <div class="mr-2 col-md-3">
                            <div class="d-flex">
                                <input type="checkbox"  id="variant_size_${variantCount}_XL" name="variant[${variantCount}][size][XL][]" onclick="showQuantityInput(${variantCount}, 'XL')" value="XL">XL
                            </div>
                            <div id="soluongsize_${variantCount}_XL" style="display: none;">
                                <label >Số lượng:</label>
                                <input type="text" class=" w-100" name="variant[${variantCount}][size][XL][]" id="">
                            </div>
                        </div>
                        <div class="mr-2 col-md-3">
                            <div class="d-flex">
                                <input type="checkbox" id="variant_size_${variantCount}_XXL" name="variant[${variantCount}][size][XXL][]" onclick="showQuantityInput(${variantCount}, 'XXL')" value="XXL">XXL
                            </div>
                            <div id="soluongsize_${variantCount}_XXL" style="display: none;">
                                <label >Số lượng:</label>
                                <input type="text" class=" w-100" name="variant[${variantCount}][size][XXL][]" id="">
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="variancont" id="variancont" value="${variantCount}">
                <?php
                if (isset($_POST['variancont'])) {
                    $vartiantcount = $_POST['variancont'];
                ?>
                <div class="d-flex justify-content-between">
                    <span class=" text-warning"><?= (isset($errors[$vartiantcount]['size']) && $errors[$vartiantcount]['size'] != "") ? $errors[$vartiantcount]['size'] : ''; ?></span>
                    <span class=" text-warning"><?= (isset($errors[$vartiantcount]['soluong']) && $errors[$vartiantcount]['soluong'] != "") ? $errors[$vartiantcount]['soluong'] : ''; ?></span>
                </div>   
                <?php } ?> 
                <div><button type="button" class="btn btn-danger mb-2" onclick="removeVariant(${variantCount})">Xóa</button></div>
   `;
        document.getElementById("variants").appendChild(variantDiv);
    }

    function removeVariant(variantCountToRemove) {
        var variantDivToRemove = document.getElementById(`variants_${variantCountToRemove}`);
        variantDivToRemove.remove();
    }

    function showQuantityInput(variantCount, size) {
        var quantityDiv = document.getElementById(`soluongsize_${variantCount}_${size}`);
        if (document.getElementById(`variant_size_${variantCount}_${size}`).checked) {
            quantityDiv.style.display = "block";
        } else {
            quantityDiv.style.display = "none";
        }
    }
    window.onload = function() {
        // Lặp qua tất cả các variant để kiểm tra trạng thái của checkbox
        var variantCount = 1; // Bắt đầu với variantCount là 1
        while (document.getElementById(`variant_size_${variantCount}_S`)) { // Kiểm tra xem checkbox có tồn tại không
            ['S', 'M', 'L', 'XL', 'XXL'].forEach(function(size) {
                showQuantityInput(variantCount, size); // Kiểm tra trạng thái của checkbox cho mỗi size của từng variant
            });
            variantCount++; // Tăng variantCount lên 1 để kiểm tra variant tiếp theo
        }
    };
</script>