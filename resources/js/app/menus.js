import api from 'api';

const memberHeaderMenu = [
    {
        label: 'Кабинет',
        icon: 'pi pi-home',
        to: '/'
    },
];

const memberUserMenu = [
    {
        label: 'Выйти',
        icon: 'pi pi-fw pi-power-off',
        command: () => {
            api.auth.logout();
        },
    },
];

export {
    memberHeaderMenu,
    memberUserMenu,
}
