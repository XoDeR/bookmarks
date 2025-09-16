<script setup lang="ts">
import { Link } from '@/types';


interface Props {
  links: Link[];
  searchString: string;
  filteredTags: string[];
  showUntaggedOnly: boolean;
}

const props = withDefaults(defineProps<Props>(), {
  links: () => [],
  searchString: '',
  filteredTags: () => [],
  showUntaggedOnly: false,
})

</script>

<template>
  <ul>
    <li v-for="link in links">
      <span>{{ link.title }}</span>
      <span>{{ link.link }}</span>
    </li>
  </ul>
</template>