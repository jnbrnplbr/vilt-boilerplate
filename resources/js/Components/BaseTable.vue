<script setup>
import { computed, ref } from "vue";
import { useMainStore } from "@/Stores/main";
import { mdiEye, mdiTrashCan, mdiPencil } from "@mdi/js";
import CardBoxModal from "@/Components/CardBoxModal.vue";
import TableCheckboxCell from "@/Components/TableCheckboxCell.vue";
import BaseLevel from "@/Components/BaseLevel.vue";
import BaseButtons from "@/Components/BaseButtons.vue";
import BaseButton from "@/Components/BaseButton.vue";
import UserAvatar from "@/Components/UserAvatar.vue";
import { router } from "@inertiajs/vue3";

const props = defineProps({
  checkable: {
    type: Object,
    default: {
      visible: false,
      props: ''
    }
  },
  itemPerPage: {
    type: Number,
    default: 5
  },
  settings: {
    type: Object,
    default: {
      label: '',
      prop: '',
      maxWidth: 220,
      sortable: true
    }
  },
  items: {
    type: Object,
    default: []
  }
});

const mainStore = useMainStore();


const isModalActive = ref(false);

const isModalDangerActive = ref(false);

const perPage = ref(props.itemPerPage);

const currentPage = ref(0);

const checkedRows = ref([]);

const itemsPaginated = computed(() =>
  props.items.slice(
    perPage.value * currentPage.value,
    perPage.value * (currentPage.value + 1)
  )
);

const numPages = computed(() => Math.ceil(props.items.length / perPage.value));

const currentPageHuman = computed(() => currentPage.value + 1);

const pagesList = computed(() => {
  const pagesList = [];

  for (let i = 0; i < numPages.value; i++) {
    pagesList.push(i);
  }

  return pagesList;
});

const remove = (arr, cb) => {
  const newArr = [];

  arr.forEach((item) => {
    if (!cb(item)) {
      newArr.push(item);
    }
  });

  return newArr;
};

const checked = (isChecked, item) => {
  if (isChecked) {
    checkedRows.value.push(item);
  } else {
    checkedRows.value = remove(
      checkedRows.value,
      (row) => row.id === item.id
    );
  }
};

const selected = ref([]);

const openDestroyModal = (item) => {
  isModalDangerActive.value = true
  selected.value = item
};

const destroy = () => {
  router
    .delete(selected.value.can.delete.route, {
      onSuccess: () => {
        isModalDangerActive.value = false
      }
  });
};

</script>

<template>
  <CardBoxModal v-model="isModalActive" title="Sample modal">
    <p>Lorem ipsum dolor sit amet <b>adipiscing elit</b></p>
    <p>This is sample modal</p>
  </CardBoxModal>

  <CardBoxModal
    v-model="isModalDangerActive"
    title="Please confirm"
    button="danger"
    buttonLabel="Confirm"
    has-cancel
    @click:delete="destroy"
  >
    <p>Are you sure you want to <b class="text-red-700 font-bold">delete</b> this item?</p>
    <p class="text-red-700">This process cannot be undone.</p>
  </CardBoxModal>

  <div v-if="checkedRows.length" class="p-3 bg-gray-100/50 dark:bg-slate-800">
    <span
      v-for="checkedRow in checkedRows"
      :key="checkedRow.id"
      class="inline-block px-2 py-1 rounded-sm mr-2 text-sm bg-sky-100 dark:bg-slate-700"
    >
      {{ checkedRow[props.checkable.props] }}
    </span>
  </div>

  <table>
    <thead>
      <tr>
        <th v-if="props.checkable" />
          <th 
            v-for="head in props.settings"
            v-html="head.label"
          ></th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="item in itemsPaginated" :key="item.id">
        <TableCheckboxCell
          v-if="checkable.visible"
          @checked="checked($event, item)"
        />
        <td 
          :colspan="checkable.visible? 1 : 2"
          v-for="(data,d) in props.settings"
          :key="d"
          :data-label="data.label"
          v-html="item[data.prop]"
        >
        </td>
        <td class="before:hidden lg:w-1 whitespace-nowrap">
          <BaseButtons type="justify-start lg:justify-end" no-wrap>
            <BaseButton
              v-if="item.can.show.visible"
              :href="item.can.show.route"
              color="lightDark"
              :icon="mdiEye"
              small
            />
            <BaseButton
              v-if="item.can.edit.visible"
              :href="item.can.edit.route"
              color="info"
              :icon="mdiPencil"
              small
            />
            <BaseButton
              v-if="item.can.delete.visible"
              color="danger"
              :icon="mdiTrashCan"
              small
              @click="openDestroyModal(item)"
            />
          </BaseButtons>
        </td>
      </tr>
    </tbody>
  </table>
  <div class="p-3 lg:px-6 border-t border-gray-100 dark:border-slate-800">
    <BaseLevel>
      <BaseButtons>
        <BaseButton
          v-for="page in pagesList"
          :key="page"
          :active="page === currentPage"
          :label="page + 1"
          :color="page === currentPage ? 'lightDark' : 'whiteDark'"
          small
          @click="currentPage = page" 
        />
      </BaseButtons>
      <small>Page {{ currentPageHuman }} of {{ numPages }}</small>
    </BaseLevel>
  </div>
</template>
