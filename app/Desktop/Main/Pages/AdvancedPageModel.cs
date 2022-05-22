using System;
using Avalonia.Controls;
using DHT.Desktop.Dialogs.Message;
using DHT.Desktop.Main.Controls;
using DHT.Server.Database;
using DHT.Server.Service;
using DHT.Utils.Models;

namespace DHT.Desktop.Main.Pages {
	sealed class AdvancedPageModel : BaseModel, IDisposable {
		public ServerConfigurationPanelModel ServerConfigurationModel { get; }

		private readonly Window window;
		private readonly IDatabaseFile db;

		[Obsolete("Designer")]
		public AdvancedPageModel() : this(null!, DummyDatabaseFile.Instance, ServerManager.Dummy) {}

		public AdvancedPageModel(Window window, IDatabaseFile db, ServerManager serverManager) {
			this.window = window;
			this.db = db;

			ServerConfigurationModel = new ServerConfigurationPanelModel(window, serverManager);
		}

		public void Initialize() {
			ServerConfigurationModel.Initialize();
		}

		public void Dispose() {
			ServerConfigurationModel.Dispose();
		}

		public async void VacuumDatabase() {
			db.Vacuum();
			await Dialog.ShowOk(window, "Vacuum Database", "Done.");
		}
	}
}
