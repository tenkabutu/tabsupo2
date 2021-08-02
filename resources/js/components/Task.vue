<template>
	<tr class="task">
		<td>{{item.案件No.val}}</td>
     <td>{{item.学校名.val}}</td>
     <td>{{item.案件状態.val}}</td>
     <td>{{item.担当者名.val}}</td>
      <td><RouterLink
      class="task__overlay"
      :to="`/tasks/${item.案件No.val}`"
      :title="`View the task by ${item.学校名.val}`">
        <button
          class="photo__action photo__action--like"
          title="Like photo"
        >
        </button>
          <i class="icon ion-md-arrow-round-down">編集</i>


    </RouterLink></td>
  </tr>
</template>

<script>
export default {
  props: {
    item: {
      type: Object,
      required: true
    }
  }
}
</script>