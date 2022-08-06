using System;
using System.Collections;
using System.ComponentModel;
using System.Diagnostics.CodeAnalysis;
using CommunityToolkit.Mvvm.ComponentModel;

namespace DHT.Desktop.Dialogs.TextBox {
	partial class TextBoxItem : ObservableObject, INotifyDataErrorInfo {
		public string Title { get; init; } = "";
		public object? Item { get; init; } = null;
		
		public Func<string, bool> ValidityCheck { get; init; } = static _ => true;
		public bool IsValid => ValidityCheck(Value);

		[ObservableProperty]
		private string value = string.Empty;

		[SuppressMessage("ReSharper", "UnusedParameterInPartialMethod")]
		partial void OnValueChanged(string value) {
			ErrorsChanged?.Invoke(this, new DataErrorsChangedEventArgs(nameof(Value)));
		}

		public IEnumerable GetErrors(string? propertyName) {
			if (propertyName == nameof(Value) && !IsValid) {
				yield return string.Empty;
			}
		}

		public bool HasErrors => !IsValid;
		public event EventHandler<DataErrorsChangedEventArgs>? ErrorsChanged;
	}

	sealed class TextBoxItem<T> : TextBoxItem {
		public new T Item { get; }

		public TextBoxItem(T item) {
			this.Item = item;
			base.Item = item;
		}
	}
}
