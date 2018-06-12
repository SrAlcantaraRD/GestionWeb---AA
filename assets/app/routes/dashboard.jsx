import DashboardPage from "../views/Dashboard/Dashboard.jsx";
import UserProfile from "../views/UserProfile/UserProfile.jsx";
import TableList from "../views/TableList/TableList.jsx";
import Typography from "../views/Typography/Typography.jsx";

import {
  Dashboard,
  Person,
  ContentPaste,
  LibraryBooks,
  BubbleChart,
  LocationOn,
  Notifications
} from "@material-ui/icons";

const dashboardRoutes = [
  {
    path: "/Dashboard",
    sidebarName: "Inicio",
    navbarName: "Material Dashboard",
    icon: Dashboard,
    component: DashboardPage
  },
  {
    path: "/User",
    sidebarName: "Configuración",
    navbarName: "Profile",
    icon: Person,
    component: UserProfile
  },
  {
    path: "/Services",
    sidebarName: "Servicios",
    navbarName: "Services",
    icon: ContentPaste,
    component: TableList
  },
  {
    path: "/ControlPanel",
    sidebarName: "Panel de Control",
    navbarName: "ControlPanel",
    icon: LibraryBooks,
    component: Typography
  },
  { redirect: true, path: "/", to: "/Dashboard", navbarName: "Redirect" }
];

export default dashboardRoutes;
