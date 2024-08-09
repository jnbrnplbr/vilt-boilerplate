import {
  mdiAccountCircle,
  mdiMonitor,
  mdiGithub,
  mdiLock,
  mdiAlertCircle,
  mdiSquareEditOutline,
  mdiTable,
  mdiViewList,
  mdiTelevisionGuide,
  mdiResponsive,
  mdiPalette,
  mdiCog,
  mdiCodeBraces,
  mdiCompost,
} from "@mdi/js";

export default [
  {
    route: "dashboard",
    icon: mdiMonitor,
    label: "Dashboard",
  },
  // {
  //   to: "/tables",
  //   label: "Tables",
  //   icon: mdiTable,
  // },
  // {
  //   to: "/forms",
  //   label: "Forms",
  //   icon: mdiSquareEditOutline,
  // },
  // {
  //   to: "/ui",
  //   label: "UI",
  //   icon: mdiTelevisionGuide,
  // },
  // {
  //   to: "/responsive",
  //   label: "Responsive",
  //   icon: mdiResponsive,
  // },
  // {
  //   to: "/",
  //   label: "Styles",
  //   icon: mdiPalette,
  // },
  // {
  //   to: "/profile",
  //   label: "Profile",
  //   icon: mdiAccountCircle,
  // },
  // {
  //   to: "/login",
  //   label: "Login",
  //   icon: mdiLock,
  // },
  // {
  //   to: "/error",
  //   label: "Error",
  //   icon: mdiAlertCircle,
  // },
  {
    label: "File Maintenance",
    icon: mdiViewList,
    menu: [
      // {
      //   label: "Company",
      //   menu: [
      //     {
      //       label: "Companies"
      //     },
      //     {
      //       label: "Branches",
      //     },
      //     {
      //       label: "Departments"
      //     }
      //   ]
      // },
      {
        route: "blood_types:index",
        label: "Blood Types",
      },
      {
        route: "genders:index",
        label: "Genders",
      },
      {
        label: "Users",
        menu: [
          {
            route: "users:assistants",
            label: "Assistants",
          },
          {
            route: "users:doctors",
            label: "Doctors",
          },
          {
            route: "users:patients",
            label: "Patients"
          },
        ]
      }
    ],
  },
  {
    label: "Utilities",
    icon: mdiCog,
    menu: [
      {
        label: "Menu",
      },
      {
        route: "roles:index",
        label: "Roles",
      },
      {
        route: "users:index",
        label: "Users"
      }
    ],
  },
  {
    label: "Developers Option",
    icon: mdiCodeBraces,
    menu: [
      {
        label: "Components",
        menu: [
          { 
            label: 'Buttons',
          },
          {
            route: 'dev:components:form-field',
            label: 'Form Field',
          },
          { 
            label: 'Overlays',
          },
        ]
      },
      {
        label: "Tables",
        menu: [
          {
            label: 'Data Table'
          },
          {
            label: 'Simple Table'
          }
        ]
      },
    ],
  },
  {
    href: "https://github.com/jnbrnplbr",
    label: "GitHub",
    icon: mdiGithub,
    target: "_blank",
  },
];
