document.addEventListener('DOMContentLoaded', function() {
    let completedCount = 0;
    const today = new Date();
    const timelineItems = document.querySelectorAll('.timeline-item');

    timelineItems.forEach(item => {
        const startDateStr = item.getAttribute('data-start');
        const endDateStr = item.getAttribute('data-end');

        if (!startDateStr || !endDateStr) return;

        const startDate = new Date(startDateStr + 'T00:00:00');
        const endDate = new Date(endDateStr + 'T23:59:59');

        const badge = item.querySelector('.timeline-badge');
        const content = item.querySelector('.timeline-content');

        if (today < startDate) {
            item.classList.add('upcoming');
        } else if (today > endDate) {
            item.classList.add('completed');
            completedCount++;

            const statusIndicator = content.querySelector('.status-indicator');
            if (statusIndicator) {
                statusIndicator.remove();
            }
        } else {
            item.classList.add('active');

            if (!content.querySelector('.status-indicator')) {
                const statusIndicator = document.createElement('div');
                statusIndicator.className = 'status-indicator';
                statusIndicator.innerHTML = '<span class="status-dot"></span>Sedang Berlangsung';
                content.appendChild(statusIndicator);
            }

            if (!badge.classList.contains('active-badge')) {
                badge.classList.add('active-badge');
            }

            const dot = item.querySelector('.timeline-dot');
            if (!dot.querySelector('.pulse-ring')) {
                const pulseRing = document.createElement('span');
                pulseRing.className = 'pulse-ring';
                dot.appendChild(pulseRing);
            }
        }
    });


    const timeline = document.querySelector('.timeline');
    if (!timeline) return;

    const timelineStyle = document.createElement('style');
    const styleId = 'timeline-gradient-style';
    if (document.head.querySelector('#' + styleId)) {
        document.head.querySelector('#' + styleId).remove();
    }

    timelineStyle.id = styleId;
    const token = document.head.querySelector('meta[property="csp-nonce"]');
    if (token) {
        timelineStyle.setAttribute('nonce', token.content);
    }

    const percentage = completedCount >= 0 ? (completedCount / timelineItems.length) * 100 : 0;
    timelineStyle.innerHTML = `
        .timeline::before {
            background: linear-gradient(180deg,
                #1abc9c 0%,
                #1abc9c ${percentage + 2}%,
                #e0e0e0 ${percentage + 2}%,
                #e0e0e0 100%) !important;
        }
    `;

    document.head.appendChild(timelineStyle);
});
