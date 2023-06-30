<script>
    const min_w = 1600;
    const min_h = 840;
    const vw = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0)
    const vh = Math.max(document.documentElement.clientHeight || 0, window.innerHeight || 0)

    // 1600
    // 840

    if (vw >= min_w && vh >= min_h) {
        alert('supported');
    } else if (vw >= window.innerWidth && vh >= window.innerHeight) {
        alert('capable to scale up');
    } else {
        alert('cant support');
    }
</script>
