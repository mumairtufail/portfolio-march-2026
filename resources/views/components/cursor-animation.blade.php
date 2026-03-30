{{-- Cursor Animation Component --}}
<div class="glow-cursor"></div>

<style>
    /* Glowing cursor effect */
    .glow-cursor {
        position: fixed;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(102, 126, 234, 0.3) 0%, transparent 70%);
        pointer-events: none;
        z-index: 9999;
        transition: transform 0.1s ease;
        opacity: 0;
    }

    /* Show cursor only on devices with mouse pointer */
    @media (pointer: fine) {
        .glow-cursor {
            opacity: 1;
        }
    }

    /* Hide on touch devices */
    @media (pointer: coarse) {
        .glow-cursor {
            display: none;
        }
    }
</style>

<script>
    // Glowing cursor effect
    document.addEventListener('DOMContentLoaded', function() {
        const cursor = document.querySelector('.glow-cursor');
        
        if (cursor) {
            // Mouse move effect
            document.addEventListener('mousemove', (e) => {
                cursor.style.left = e.clientX - 10 + 'px';
                cursor.style.top = e.clientY - 10 + 'px';
            });

            // Click particle effect
            document.addEventListener('click', (e) => {
                // Only create particles on devices with fine pointer (mouse)
                if (window.matchMedia('(pointer: fine)').matches) {
                    for (let i = 0; i < 5; i++) {
                        const particle = document.createElement('div');
                        particle.style.cssText = `
                            position: fixed;
                            width: 4px;
                            height: 4px;
                            background: linear-gradient(135deg, #667eea, #764ba2);
                            border-radius: 50%;
                            pointer-events: none;
                            z-index: 1000;
                            left: ${e.clientX}px;
                            top: ${e.clientY}px;
                            opacity: 1;
                        `;
                        
                        document.body.appendChild(particle);
                        
                        // Animate particle
                        const angle = (Math.PI * 2 * i) / 5;
                        const velocity = 100;
                        const vx = Math.cos(angle) * velocity;
                        const vy = Math.sin(angle) * velocity;
                        
                        let startTime = null;
                        const duration = 1000;
                        
                        function animateParticle(timestamp) {
                            if (!startTime) startTime = timestamp;
                            const progress = (timestamp - startTime) / duration;
                            
                            if (progress < 1) {
                                const currentX = e.clientX + vx * progress * 0.5;
                                const currentY = e.clientY + vy * progress * 0.5 + 0.5 * 300 * progress * progress;
                                const opacity = 1 - progress;
                                
                                particle.style.left = currentX + 'px';
                                particle.style.top = currentY + 'px';
                                particle.style.opacity = opacity;
                                particle.style.transform = `scale(${1 - progress * 0.5})`;
                                
                                requestAnimationFrame(animateParticle);
                            } else {
                                if (particle.parentNode) {
                                    particle.parentNode.removeChild(particle);
                                }
                            }
                        }
                        
                        requestAnimationFrame(animateParticle);
                    }
                }
            });

            // Hover effects for interactive elements
            const interactiveElements = document.querySelectorAll('a, button, .clickable, [onclick]');
            
            interactiveElements.forEach(element => {
                element.addEventListener('mouseenter', () => {
                    cursor.style.transform = 'scale(1.5)';
                    cursor.style.background = 'radial-gradient(circle, rgba(102, 126, 234, 0.5) 0%, transparent 70%)';
                });
                
                element.addEventListener('mouseleave', () => {
                    cursor.style.transform = 'scale(1)';
                    cursor.style.background = 'radial-gradient(circle, rgba(102, 126, 234, 0.3) 0%, transparent 70%)';
                });
            });
        }
    });
</script>