</main>
            <footer style="padding: 20px 30px; text-align: left; color: #94a3b8; font-size: 13px; border-top: 1px solid #e2e8f0; background: #fff; margin-top: auto;">
                &copy; <?= date('Y'); ?> <strong style="color: var(--text-dark);">RON PHP Framework v1.0</strong>. Dibuat oleh Radika Istiawan.
            </footer>

        </div> 
        </div> 
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleBtn = document.getElementById('toggle-btn');
            const sidebarWide = document.querySelector('.sidebar-wide');
            const overlay = document.getElementById('sidebar-overlay');

            // Fungsi saat tombol garis tiga diklik
            toggleBtn.addEventListener('click', function() {
                if (window.innerWidth <= 768) {
                    // MODE MOBILE: Munculkan Laci & Layar Gelap
                    sidebarWide.classList.toggle('show-mobile');
                    if (sidebarWide.classList.contains('show-mobile')) {
                        overlay.classList.add('show');
                    } else {
                        overlay.classList.remove('show');
                    }
                } else {
                    // MODE DESKTOP: Geser Sidebar Lebar (Kecil/Besar)
                    sidebarWide.classList.toggle('hidden');
                }
            });

            // Fungsi saat area gelap diklik (hanya berlaku di Mobile)
            overlay.addEventListener('click', function() {
                sidebarWide.classList.remove('show-mobile');
                overlay.classList.remove('show');
            });

            // Antisipasi jika user me-resize layar dari HP ke Desktop
            window.addEventListener('resize', function() {
                if (window.innerWidth > 768) {
                    overlay.classList.remove('show');
                    sidebarWide.classList.remove('show-mobile');
                }
            });
        });
    </script>
</body>
</html>