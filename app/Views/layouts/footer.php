</main>
            <footer style="padding: 20px 30px; text-align: left; color: #94a3b8; font-size: 13px; border-top: 1px solid #e2e8f0; background: #fff; margin-top: auto;">
                &copy; <?= date('Y'); ?> <strong style="color: var(--text-dark);">RON PHP Framework</strong>. Dibuat oleh Radika Istiawan.
            </footer>

        </div> 
        </div> 
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleBtn = document.getElementById('toggle-btn');
            const sidebarWide = document.querySelector('.sidebar-wide');

            toggleBtn.addEventListener('click', function() {
                // Untuk layar PC
                sidebarWide.classList.toggle('hidden');
                
                // Untuk layar HP
                if (window.innerWidth <= 768) {
                    sidebarWide.classList.toggle('show-mobile');
                    // Cegah class 'hidden' konflik di HP
                    sidebarWide.classList.remove('hidden'); 
                }
            });
        });
    </script>
</body>
</html>