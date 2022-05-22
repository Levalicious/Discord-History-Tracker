using System;
using DHT.Server.Database;

namespace DHT.Server.Service {
	public sealed class ServerManager : IDisposable {
		public static ServerManager Dummy { get; } = new ();

		private static ServerManager? instance;

		public event EventHandler? ServerStatusChanged;
		public event EventHandler<Exception>? ServerManagementExceptionCaught;

		public ushort Port { get; private set; }
		public string Token { get; private set; }
		
		public bool IsRunning => ServerLauncher.IsRunning;

		private readonly IDatabaseFile db;

		private ServerManager() {
			this.db = DummyDatabaseFile.Instance;
			this.Port = 0;
			this.Token = string.Empty;
		}

		public ServerManager(IDatabaseFile db, ushort port, string token) {
			if (instance != null) {
				throw new InvalidOperationException("Only one instance of ServerManager can exist at the same time!");
			}

			instance = this;

			this.db = db;
			this.Port = port;
			this.Token = token;
			
			ServerLauncher.ServerStatusChanged += OnServerStatusChanged;
			ServerLauncher.ServerManagementExceptionCaught += OnServerManagementExceptionCaught;
		}

		private void OnServerStatusChanged(object? sender, EventArgs args) {
			ServerStatusChanged?.Invoke(sender, args);
		}

		private void OnServerManagementExceptionCaught(object? sender, Exception args) {
			ServerManagementExceptionCaught?.Invoke(sender, args);
		}

		private void ThrowIfDummy() {
			if (this == Dummy) {
				throw new InvalidOperationException("Dummy instance of ServerManager cannot use server management!");
			}
		}

		public void Launch() {
			ThrowIfDummy();
			ServerLauncher.Relaunch(Port, Token, db);
		}

		public void Relaunch(ushort port, string token) {
			this.Port = port;
			this.Token = token;
			Launch();
		}

		public void Stop() {
			ThrowIfDummy();
			ServerLauncher.Stop();
		}

		public void Dispose() {
			if (IsRunning) {
				Stop();
			}

			ServerLauncher.ServerStatusChanged -= OnServerStatusChanged;
			ServerLauncher.ServerManagementExceptionCaught -= OnServerManagementExceptionCaught;

			if (instance == this) {
				instance = null;
			}
		}
	}
}
