<script src="<?= BASE_URL; ?>assets/client/js/carousel_with_thumbs.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var inputs = document.querySelectorAll('.qty2');
        inputs.forEach(function(input) {
            input.addEventListener('input', function() {
                var max = parseInt(this.getAttribute('data-max'));
                var min = parseInt(this.getAttribute('data-min'));
                var value = parseInt(this.value);
                if (value > max) {
                    this.value = max;
                }
                if (value < 0) {
                    this.value = min;
                }
            });
        });
    });
</script>
