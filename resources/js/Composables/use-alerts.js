import {ref} from "vue";
import {v4 as uuidv4} from "uuid";
const alerts = ref([]);

export default function useAlerts() {
    const removeAlert = (id) => {
        setTimeout(() => {
            alerts.value = alerts.value.filter(alert => alert.id !== id);
        }, 3000);
    };
  
    const addAlert = (alert) => {
        const id = uuidv4();
        alerts.value.push({
            id: id,
            ...alert
        });
        removeAlert(id);
        if (alerts.value.length > 5) {
            alerts.value = alerts.value.slice(1);
        }
    };
  
    return {
        alerts,
        addAlert,
        removeAlert
    }
}