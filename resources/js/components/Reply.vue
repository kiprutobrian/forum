<script>
export default {
	props: ['attributes'],
	data() {
		return {
			editing: false,
			body: this.attributes.body
		}
	},
	methods: {
		update() {
			axios.patch('/replies/' + this.attributes.id, {
				body: this.body
			})
			this.editing = false
			flash('Updated!')
		},
		destroy() {
			axios.delete('/replies/' + this.attributes.id)
			$(this.$el).fadeOut(300, () => {
				flash('Your reply has been deleted!!')
			})
		}
	}
}
</script>

<style>
body {
	padding-bottom: 100px;
}
.level {
	display: flex;
	align-items: center;
}
.flex {
	flex: 1;
}
.mr-1 {
	margin-right: 1em;
}
[v-cloak] {
	display: none;
}
</style>
