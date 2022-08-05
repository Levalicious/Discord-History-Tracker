using System;
using CommunityToolkit.Mvvm.ComponentModel;
using DHT.Server.Database;

namespace DHT.Desktop.Main.Controls {
	sealed partial class StatusBarModel : ObservableObject {
		public DatabaseStatistics DatabaseStatistics { get; }

		[ObservableProperty]
		[NotifyPropertyChangedFor(nameof(StatusText))]
		private Status currentStatus = Status.Stopped;

		public string StatusText {
			get {
				return CurrentStatus switch {
					Status.Starting => "STARTING",
					Status.Ready    => "READY",
					Status.Stopping => "STOPPING",
					Status.Stopped  => "STOPPED",
					_               => ""
				};
			}
		}

		[Obsolete("Designer")]
		public StatusBarModel() : this(new DatabaseStatistics()) {}

		public StatusBarModel(DatabaseStatistics databaseStatistics) {
			this.DatabaseStatistics = databaseStatistics;
		}

		public enum Status {
			Starting,
			Ready,
			Stopping,
			Stopped
		}
	}
}
