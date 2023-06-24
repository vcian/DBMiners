const tabs = document.querySelectorAll('[data-tab-value]');
const tabInfos = document.querySelectorAll('[data-tab-info]');

tabs.forEach((tab) => {
    tab.addEventListener('click', () => {
        const target = document.querySelector(tab.dataset.tabValue);

        const targetValue = tab.dataset.tabValue;
        tabs.forEach((otherTab) => {
            otherTab.classList.toggle('active', otherTab === tab);
        });

        tabInfos.forEach((tabInfo) => {
            tabInfo.classList.toggle('active', tabInfo.dataset.tabInfo === targetValue);
        });
        target.classList.add('active');
    });
});