using System;
using System.Threading.Tasks;
using Avalonia.Threading;
using CommunityToolkit.Mvvm.ComponentModel;
using DHT.Desktop.Common;

namespace DHT.Desktop.Dialogs.Progress {
	sealed partial class ProgressDialogModel : ObservableObject {
		public string Title { get; init; } = "";

		[ObservableProperty(Setter = Access.Private)]
		private string message = "";

		[ObservableProperty(Setter = Access.Private)]
		private string items = "";

		[ObservableProperty(Setter = Access.Private)]
		private int progress = 0;

		private readonly TaskRunner? task;

		[Obsolete("Designer")]
		public ProgressDialogModel() {}

		public ProgressDialogModel(TaskRunner task) {
			this.task = task;
		}

		internal async Task StartTask() {
			if (task != null) {
				await task(new Callback(this));
			}
		}

		public delegate Task TaskRunner(IProgressCallback callback);

		private sealed class Callback : IProgressCallback {
			private readonly ProgressDialogModel model;

			public Callback(ProgressDialogModel model) {
				this.model = model;
			}

			async Task IProgressCallback.Update(string message, int finishedItems, int totalItems) {
				await Dispatcher.UIThread.InvokeAsync(() => {
					model.Message = message;
					model.Items = finishedItems.Format() + " / " + totalItems.Format();
					model.Progress = 100 * finishedItems / totalItems;
				});
			}
		}
	}
}
