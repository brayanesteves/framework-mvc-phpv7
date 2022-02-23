
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>   
    <?php if(isset($_layoutParams['libsjs']) && count($_layoutParams['libsjs'])): ?>
    <?php for($i = 0; $i < count($_layoutParams['libsjs']); $i++): ?>
    <script src="<?php echo $_layoutParams['libsjs'][$i]; ?>"></script>
    <?php endfor; ?>
    <?php endif; ?>
    <?php if(isset($_layoutParams['js']) && count($_layoutParams['js'])): ?>
    <?php for($i = 0; $i < count($_layoutParams['js']); $i++): ?>
    <script src="<?php echo $_layoutParams['js'][$i]; ?>"></script>
    <?php endfor; ?>
    <?php endif; ?>
</body>
</html>